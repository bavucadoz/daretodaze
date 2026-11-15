# DARETODAZE — Product Requirements Document

**Versi:** 1.1.0 | **Stack:** Laravel, PHP, Blade, CSS, JavaScript, PostgreSQL/MySQL

## 1. Ringkasan
DARETODAZE adalah majalah digital independen tentang fashion, digital fashion, visual art, avatar culture, dan internet culture. Website ini juga menjadi portofolio yang menggabungkan Laravel development, UI/UX, dan art direction.

## 2. Visi dan tujuan
**Visi:** ruang editorial digital yang memadukan fashion, seni visual, dan budaya internet.

Tujuan:
- Menampilkan artikel dan editorial dengan identitas visual khas.
- Mengarsipkan edisi berdasarkan bulan/tema.
- Menampilkan visual dan karya dengan kredit kreator.
- Menyediakan CMS untuk admin.
- Menjadi showcase kemampuan Laravel dan desain kreatif.

##  3. Target pengguna
| Persona | Kebutuhan |
|---|---|
| Pembaca | Menjelajahi artikel dan edisi |
| Kontributor | Menampilkan karya dan mendapat kredit |
| Admin/editor | Mengelola artikel, edisi, kategori, dan media |
| Recruiter/reviewer | Melihat kemampuan teknis dan desain |

## 4. MVP scope

### Website publik
- Homepage, Stories listing, detail artikel.
- Issues listing dan detail edisi.
- Visual Archive, About.
- Search dan filter kategori.
- Responsive layout.
- SEO metadata dasar.

### CMS/Admin
- Admin login/logout.
- Dashboard.
- CRUD artikel, edisi, kategori, kontributor, visual archive.
- Upload cover/media.
- Draft/published status.

### Fitur lanjutan (bukan MVP)
Newsletter, bookmarks, analytics, multi-language, komentar, PWA.

## 5. Sitemap
| Page | Content |
|---|---|
| Home | Hero, stories terbaru, featured issue |
| Stories | Artikel, search, filter, pagination |
| Story Detail | Cover, judul, author, date, category, body |
| Issues | Daftar edisi |
| Issue Detail | Cover, tema, artikel terkait |
| Archive | Galeri visual dan filter |
| About | Profil, visi editorial, kontak |
| Admin | Dashboard dan CRUD |

## 6. Functional requirements
- FR-01 Homepage publik.
- FR-02 Daftar dan detail artikel.
- FR-03 Search artikel.
- FR-04 Filter kategori.
- FR-05 Daftar dan detail issue.
- FR-06 Admin authentication.
- FR-07 CRUD artikel.
- FR-08 CRUD issue, category, contributor, archive.
- FR-09 Upload media dengan validasi.
- FR-10 Draft tidak tampil publik.
- FR-11 Responsive UI.
- FR-12 Warna cover issue dapat diatur per edisi.

## 7. Non-functional requirements
- Usability: navigasi jelas dan editorial typography terbaca.
- Performance: image optimization, pagination, lazy loading.
- Security: CSRF, validation, auth/authorization, escaping.
- Maintainability: Laravel MVC dan reusable Blade components.
- Accessibility: semantic HTML, alt text, focus state, kontras.
- Reliability: migrations dan backup.

## 8. Content policy
- Draft tidak tampil di halaman publik.
- Slug harus unik.
- Visual memiliki alt text dan credit jika relevan.
- Gunakan materi pihak ketiga hanya dengan izin/lisensi.
- Konten Zepeto/avatar mengikuti aturan platform dan izin kreator.

## 9. Data utama
User, Article, Category, Issue, Contributor, ArchiveItem.

## 10. Acceptance criteria
- Public pages berfungsi.
- Search/filter bekerja.
- Admin dapat login dan CRUD.
- Draft tidak bisa diakses publik.
- Upload divalidasi.
- Tema issue tampil sesuai konfigurasi.
- Responsive di desktop dan mobile.
- Tidak ada secret di repository.

## 11. Prioritas
| Priority | Feature |
|---|---|
| P0 | Public site, stories, issues, admin auth, CRUD |
| P1 | Archive, categories, contributor, upload |
| P2 | Newsletter, bookmark, analytics |

## 12. Risiko
| Risiko | Mitigasi |
|---|---|
| Scope terlalu besar | Fokus MVP |
| Upload tidak aman | Laravel validation dan Storage |
| Konten tanpa izin | Credit dan permission |
| Website lambat | Compress image dan lazy loading |
| Admin route terbuka | Auth middleware + policy/role |
