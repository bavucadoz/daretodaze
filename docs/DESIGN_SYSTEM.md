# DARETODAZE — Design System

**Versi:** 1.1.0 | **Style:** Luxury editorial, experimental, digital-native

## 1. Design direction
DARETODAZE memadukan editorial fashion mewah dengan budaya internet dan visual eksperimental. Hindari tampilan website template generik.

Prinsip:
- Editorial-first: visual dan headline dominan.
- Controlled experimentation: eksperimen tetap terarah.
- Strong typography dan whitespace.
- Responsive dan accessible.

## 2. Brand palette
| Token | Hex | Usage |
|---|---|---|
| Obsidian | `#111111` | Background/text |
| Ivory | `#F6F2E9` | Background terang |
| Silver | `#858585` | Metadata |
| Scarlet | `#E63946` | Accent |
| Acid Lime | `#D9FF57` | Experimental accent |
| Digital Blue | `#B7C9F2` | Optional accent |
| Powder Pink | `#D8A5C4` | Optional accent |

## 3. CSS tokens
```css
:root {
  --color-obsidian: #111111;
  --color-ivory: #F6F2E9;
  --color-silver: #858585;
  --color-scarlet: #E63946;
  --color-acid-lime: #D9FF57;
  --color-digital-blue: #B7C9F2;
  --color-powder-pink: #D8A5C4;
  --color-bg: var(--color-ivory);
  --color-text: var(--color-obsidian);
  --color-muted: var(--color-silver);
  --color-accent: var(--color-scarlet);
  --font-display: "Bodoni Moda", "Playfair Display", serif;
  --font-body: "Inter", "Space Grotesk", sans-serif;
  --font-mono: "IBM Plex Mono", monospace;
  --content-width: 1440px;
}
```

## 4. Typography
| Role | Font | Usage |
|---|---|---|
| Display | Bodoni Moda / Playfair Display | Cover, hero, headline |
| Body | Inter / Space Grotesk | Body, navigation, UI |
| Metadata | IBM Plex Mono | Dates, issue number, labels |

Body line-height: 1.5–1.7. Headline display font. Avoid too many font weights.

## 5. Layout
- Max width: 1440px.
- Desktop grid: 12 columns; tablet 6; mobile 4.
- Article reading width: roughly 680–760px.
- Whitespace and asymmetric grids should be intentional.
- Mobile gutters: 16–20px; desktop: 24–40px.

## 6. Components
- Header: wordmark + Stories, Issues, Archive, About; mobile menu.
- Editorial card: image, category, title, excerpt, author/date.
- Hero: editorial headline + feature visual.
- Issue cover: number, theme, month/year.
- Article: title, lead, body, caption, image credit.
- Buttons: primary dark, secondary outline, focus state.
- Admin: practical tables/forms, distinct from public editorial UI.

## 7. Issue-specific theme
Issue colors only affect that issue/cover—not the whole site.

Blade:
```blade
<section class="issue-cover"
  style="--issue-bg: {{ $issue->background_color }};
         --issue-text: {{ $issue->text_color }};
         --issue-accent: {{ $issue->accent_color }};">
  <h1>{{ $issue->title }}</h1>
</section>
```

CSS:
```css
.issue-cover {
  background: var(--issue-bg, var(--color-obsidian));
  color: var(--issue-text, var(--color-ivory));
}
```
Validate colors server-side using a strict hex color rule (e.g. `^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$`). Do not accept arbitrary CSS.

## 8. Motion
- Transition: 180–300ms.
- Prefer opacity/transform.
- Respect `prefers-reduced-motion`.
- Avoid distracting motion or autoplay audio.

## 9. Responsive
Desktop: expansive grid. Tablet: 2–3 columns. Mobile: one-column stories or compact archive grid, readable headline, 44px-ish tap targets.

## 10. Accessibility and assets
- Semantic HTML and keyboard navigation.
- Alt text and focus states.
- Sufficient contrast.
- Optimize images; lazy-load below-fold images.
- Add credits and only use licensed/authorized media.
