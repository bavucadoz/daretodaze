# DARETODAZE — Technical Architecture (Laravel)

**Version:** 1.1.0 | **Architecture:** Laravel MVC, server-rendered Blade

## 1. Recommended stack
| Layer | Technology |
|---|---|
| Backend | PHP 8.2+ / Laravel stable release |
| UI | Blade, HTML5, CSS3, JavaScript |
| Database | PostgreSQL (recommended) or MySQL |
| ORM | Eloquent |
| Auth | Laravel Breeze or compatible starter |
| Media | Laravel Storage |
| Local environment | Laragon, Laravel Herd, or Docker |
| Deployment | Laravel-compatible hosting / VPS |

Check Laravel's current PHP and extension requirements when selecting the framework version.

## 2. MVC flow
```text
Browser → Route → Middleware → Controller
                         ↓
                Validation / Eloquent
                   ↙          ↘
               Database      Storage
                         ↓
                    Blade View
                         ↓
                  HTML/CSS/JS
```
- Model: data and relationships.
- View: Blade templates.
- Controller: request handling.
- Middleware: auth and access checks.
- Form Request: reusable validation.
- Service classes: optional for complex business logic.

## 3. Suggested structure
```text
daretodaze/
├── app/Http/Controllers/
│   ├── Public/ (Home, Article, Issue, Archive)
│   └── Admin/ (Dashboard, Article, Issue, Category)
├── app/Http/Requests/
├── app/Models/
│   ├── Article.php
│   ├── Category.php
│   ├── Issue.php
│   ├── Contributor.php
│   └── ArchiveItem.php
├── database/migrations/
├── database/seeders/
├── resources/views/
│   ├── layouts/
│   ├── components/
│   ├── public/
│   └── admin/
├── resources/css/
├── resources/js/
├── routes/web.php
├── storage/app/public/
├── tests/
├── .env
└── README.md
```
Use Laravel conventions. Uploaded files should normally be stored via Laravel Storage, not directly in `public/uploads`.

## 4. Database entities
### users
`id, name, email(unique), password, role(optional), timestamps`

### categories
`id, name, slug(unique), description(nullable), timestamps`

### contributors
`id, name, slug(unique), bio(nullable), avatar_path(nullable), social_url(nullable), timestamps`

### issues
`id, title, slug(unique), issue_number, theme(nullable), description(nullable), cover_image_path(nullable), background_color(nullable), text_color(nullable), accent_color(nullable), status(draft/published), published_at(nullable), timestamps`

### articles
`id, category_id(nullable FK), issue_id(nullable FK), contributor_id(nullable FK), title, slug(unique), excerpt(nullable), body, cover_image_path(nullable), image_alt(nullable), credit(nullable), status(draft/published), published_at(nullable), timestamps`

### archive_items
`id, title, slug(unique), image_path, image_alt, description(nullable), tags(nullable), credit(nullable), source_url(nullable), published_at(nullable), timestamps`

Relationships: Category/Contributor/Issue has many Articles; Article belongs to each (nullable as designed). Use migrations and foreign keys.

## 5. Public routes example
```php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ArticleController;
use App\Http\Controllers\Public\IssueController;
use App\Http\Controllers\Public\ArchiveController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/stories', [ArticleController::class, 'index'])->name('stories.index');
Route::get('/stories/{article:slug}', [ArticleController::class, 'show'])->name('stories.show');
Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/{issue:slug}', [IssueController::class, 'show'])->name('issues.show');
Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.index');
```

Admin routes:
```php
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Route::resource('articles', AdminArticleController::class);
    // Route::resource('issues', AdminIssueController::class);
});
```
Use policies/gates or role middleware if there are non-admin users. `auth` by itself only checks login.

## 6. Eloquent examples
```php
// Article model
public function category()
{
    return $this->belongsTo(Category::class);
}

public function issue()
{
    return $this->belongsTo(Issue::class);
}

public function contributor()
{
    return $this->belongsTo(Contributor::class);
}
```

Published list:
```php
Article::query()
    ->where('status', 'published')
    ->whereNotNull('published_at')
    ->where('published_at', '<=', now())
    ->latest('published_at')
    ->paginate(9);
```

## 7. Validation and uploads
```php
$request->validate([
    'title' => ['required', 'string', 'max:200'],
    'slug' => ['required', 'string', 'max:220', 'unique:articles,slug'],
    'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
    'status' => ['required', 'in:draft,published'],
]);
```
For updates, use `Rule::unique(...)->ignore($model->id)`.

Upload:
```php
$path = $request->file('cover_image')->store('articles', 'public');
```
- Validate file type and size.
- Use Laravel-generated storage names.
- Store file path in DB.
- Use `php artisan storage:link`.
- Delete old media only when safe.
- Validate issue color fields as strict hex colors.

## 8. Security
- Laravel Breeze or equivalent for authentication.
- Disable public registration if CMS is admin-only.
- Use hashed passwords.
- Protect admin routes with auth and authorization.
- CSRF protection remains enabled.
- Validate every form server-side.
- Use `{{ $value }}` in Blade by default; avoid raw `{!! !!}` for untrusted content.
- Sanitize rich text if HTML is allowed.
- Keep secrets in `.env`; never commit it.
- Production `APP_DEBUG=false`, HTTPS, least-privilege DB credentials.
- Consider rate limiting login and sensitive routes.

## 9. Blade layout
```blade
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'DARETODAZE')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('components.header')
  <main>@yield('content')</main>
  @include('components.footer')
</body>
</html>
```

Views suggestion:
`layouts/public.blade.php`, `layouts/admin.blade.php`, `components/header.blade.php`, `components/footer.blade.php`, `components/article-card.blade.php`, `public/home.blade.php`, `public/stories/*`, `public/issues/*`, `admin/*`.

## 10. Setup workflow
1. Install PHP + required extensions, Composer, and Node/npm if using Vite.
2. Create Laravel project.
3. Configure `.env` DB connection.
4. Create database.
5. Run migrations.
6. Add auth scaffold if required.
7. Build Blade public pages.
8. Implement admin CRUD, upload, validation.
9. Test and deploy.

```bash
composer create-project laravel/laravel daretodaze
cd daretodaze
php artisan key:generate
php artisan migrate
npm install
npm run dev
php artisan serve
```
Commands may vary with Laravel version and auth scaffold; consult the chosen release's official setup instructions.

## 11. Testing
Feature tests:
- Homepage responds 200.
- Only published stories appear.
- Draft cannot be accessed publicly.
- Search/category filter works.
- Unauthenticated users cannot access admin.
- Non-admin user cannot manage CMS.
- CRUD validation works.
- Invalid/oversized upload is rejected.
- Slugs are unique.
- Issue colors are validated.

Manual QA: responsive screens, keyboard access, alt text, admin login, draft/publish, empty states, 404 and broken links.

## 12. Deployment
- Use Laravel-compatible hosting or VPS.
- Web root must point to Laravel `public/`.
- Configure `.env` securely and `APP_DEBUG=false`.
- Build assets with `npm run build`.
- Run migrations in a controlled release.
- Set storage permissions and HTTPS.
- Back up database and uploaded assets.
- Do not expose `.env`, `vendor`, or application source files.

## 13. Roadmap
| Phase | Deliverable |
|---|---|
| 1 | Laravel setup, DB, Git |
| 2 | Migrations, models, layout, design tokens |
| 3 | Public Home, Stories, Issues, Archive, About |
| 4 | Admin auth and CRUD |
| 5 | Upload and media credit |
| 6 | Search, filters, pagination, responsive polish |
| 7 | QA and security review |
| 8 | Deployment and README |

## 14. Definition of Done
Feature is implemented, validated, authorized, tested, responsive, documented, and contains no committed secrets.
