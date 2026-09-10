# Changelog

All notable changes to the Wandering Gorilla WordPress theme are documented in
this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.0] - 2026-09-10

The theme is redesigned around the field-journal direction that previously
existed only as a standalone mockup. The site now renders in the magazine's
visual language. It does not become a page-turning book: a blog is a scrolling
document, so the twelve-spread mechanic was deliberately left behind.

### Changed
- **Palette.** `style.css` is now built on paper and ink: warm stock
  (`#EBDFC4`), near-black ink (`#14110B`), a single press red (`#B91D1D`) for
  mastheads, department tags and folios, and gold (`#B89048`) as a sparing
  second accent. The earth-tone and cactus palette is gone
- The older `--color-*` custom properties are kept as aliases remapped onto the
  new tokens. Several hundred existing rules were written against those names;
  remapping moves the whole theme to the new palette at once instead of
  breaking every rule that had not been rewritten yet
- **Typography.** Bodoni Moda for display, Libre Caslon Text for body, Oswald
  for navigation, running heads, labels and captions, replacing Oswald and
  Crimson Text. The Google Fonts request was updated to match
- **Borders.** `--border-radius` is now `0`. Print has no rounded corners
- `header.php` renders a red masthead carrying the tagline, the site title and
  an imprint line. The department bar was split out of the header element so
  the masthead scrolls away like the cover of an issue while the navigation
  follows the reader down the page
- `footer.php` reads as a colophon, including the typographic credit
- The hero is a full-bleed photograph with a scrim over it rather than a
  fixed-height framed panel with the headline in a floating translucent card.
  `index.php` renders it as an `<img>`, so the stylesheet lays that image into
  the section rather than expecting a background
- Post cards use the plate-and-caption pattern: a ruled mount on heavier stock,
  a red category tag, a Bodoni title, a Caslon excerpt, and a rule above the
  meta line. Card shadows, rounded corners and panel backgrounds are gone
- Article bodies set justified with hyphenation and a red Bodoni drop cap
  opening a single post. Pull quotes sit between heavy rules
- Buttons are square with a hard offset shadow, in place of rounded gradient
  buttons
- Section breaks are a heavy rule over a light one, replacing a dashed rule
  with a centred glyph
- The block editor palette in `functions.php` now offers the paper-and-ink
  colours, keeping it in step with `:root` as before
- `preview.html` mirrors the markup the templates now emit, so it still shows
  the real theme
- The `style.css` theme header description describes the new design
- Theme version to 3.0.0, in `style.css` and `WANDERING_GORILLA_VERSION`

### Added
- `preview-magazine.html`, the design reference this release was drawn from: a
  1956 field journal ("Vol III, No 7") presented as a twelve-spread
  page-turning book, with its CSS inlined and not wired to WordPress
- `assets/images/yosemite-1953.jpg`, its cover plate, also used as the hero
  photograph in `preview.html`
- Ten inline SVG line engravings in that mockup, replacing flat colour blocks:
  four project plates in the workshop department and five in the photo essay,
  drawn to the captions they already carried. The plate captioned as the
  original 1953 photograph now shows that photograph
- Three letters and an editor's reply on the subscriptions spread, which ran
  under the heading "Letters to the Editor" while containing none
- Horizontal swipe navigation and `prefers-reduced-motion` support in the
  mockup's pager
- A `.gitignore` entry for `.claude/`, which holds local git worktrees

### Fixed
- The mockup's spread pager discarded input. `show()` held a lock for the
  450ms duration of a flip and returned early for anything arriving inside it,
  so at a human clicking pace roughly three of every four clicks did nothing,
  and held arrow keys advanced one spread instead of many. Flips are now
  interruptible and the spread index is committed up front
- The mockup lost half its content below 900px. Each spread stacked its two
  pages into one column inside a fixed-height `overflow: hidden` box, so the
  right-hand page of every spread was clipped and unreachable. The spread is
  now the scroll container, and the pager steps through twelve sections

### Removed
- The gradient underscore stuck beneath every `h1` and `h2`. A heading is
  separated by a rule or by space here, and the bar ignored the heading's own
  alignment
- `preview-vintage.html`, `preview-modern.html` and `preview-dark-vintage.html`,
  three abandoned design directions superseded by this release. They remain in
  git history
- The Webflow export: `webflow-components/`, `webflow-export.html`,
  `webflow-styles.css` and `WEBFLOW-SETUP-GUIDE.md`. Nothing in the theme
  referenced any of it and it encoded the 1.0.0 design that 2.0.0 replaced.
  The README had cited it as where social sharing and email signup markup
  ships, which made a dead export read like a theme feature

### Documentation
- `README.md` rewritten against the code. It had claimed WebP support, swipe
  gallery gestures, RTL stylesheets and a social menu location, none of which
  exist, and it described only the earth-tone design
- The 1.0.0 changelog entry condensed; it listed aspirations ("WCAG 2.1
  compliant", "cross-browser compatible", "fast loading") as shipped features
- `screenshot.txt` describes the new design

## [2.0.0] - 2026-09-06

### Changed
- Redesigned the theme around a natural earth-tone and cactus-inspired palette,
  replacing the vintage Documentary Americana look
- Typography set to Oswald for headlines, subheads, and navigation, with Crimson
  Text for body copy and a system sans-serif stack for UI
- Photo treatment softened from heavy vintage filtering to saturation, contrast,
  and light sepia over white polaroid borders
- Block editor color palette in `functions.php` now mirrors the `:root` custom
  properties in `style.css` (it still listed the retired neon roadhouse colors)
- Theme header tags replaced with tags WordPress actually recognises

### Fixed
- Seven CSS custom properties (`--photo-border`, `--color-photo-overlay`,
  `--color-parchment`, `--color-photo-amber`, `--color-dark-bronze`,
  `--color-support`, `--color-accent`) survived the palette rewrite as
  references but lost their definitions, leaving 55 rules resolving to nothing.
  Photo frames, photo overlays, button gradients, and text on dark backgrounds
  were all affected. `--photo-border` and `--color-photo-overlay` are now
  defined; the rest were renamed to their current palette equivalents
- Contact form success and failure notices used inline styles hardcoded to the
  retired 1.0.0 palette. They now use `.form-notice-success` and
  `.form-notice-error`, driven by new `--color-success` and `--color-error`
  custom properties
- `style.css` and `assets/js/main.js` were enqueued with a hardcoded `1.0.0`
  version, so browsers and caching layers kept serving stale assets after every
  edit. Both now use `wandering_gorilla_asset_version()`, which appends the
  file's modification time to the theme version
- Removed the hardcoded `?v=3.0.542ee13&refresh=force` cache-busting query from
  the stylesheet link in `preview.html`
- Added the missing `load_theme_textdomain()` call, so the translation strings
  used throughout the theme can actually load

### Added
- Block editor support: editor styles, wide alignment, block styles, editor font
  sizes, and a theme color palette
- Video support and deeper polaroid shadows in post content

### Removed
- `preview-standalone.html` as a filename. It collided with
  `PREVIEW-STANDALONE.html` on case-insensitive filesystems, where the two
  resolved to the same path. Its contents were preserved as
  `preview-vintage.html` and all previews were made lowercase and distinctly
  named

## [1.0.0] - 2025-11-08

Initial release, in a vintage Documentary Americana style: Rockwell slab serif
headlines with offset shadows, saddle brown on kodachrome cream, and a heavy
vintage photo filter.

### Added
- Custom post types: Route Reports, Gear Reviews, Local Intel
- Custom taxonomies: Destinations, Gear Categories
- Custom meta boxes for route details and gear review details, including a star
  rating and an affiliate link field
- Page templates: Gear Supply List, Support Page, Contact Page
- Templates for index, single, archive, category, page, comments, and 404
- Guest book style comments and related posts
- Menu locations `primary` and `footer`; widget areas for a sidebar and three
  footer regions
- Image sizes `hero-large` (1400x600), `card-thumbnail` (800x600), and
  `polaroid` (600x600)
- Photo treatment with polaroid borders and masonry galleries
- `assets/js/main.js`: mobile menu, gallery lightbox, lazy image fade-in, smooth
  anchor scrolling, hero parallax, and contact form validation
- Open Graph and Twitter Card meta tags, Schema.org markup for route reports,
  and a breadcrumb trail
- Print stylesheet

### Known issues at release
- No `screenshot.png`; a placeholder text file stands in for it
- The contact form sends through `wp_mail()`, which is unreliable on many hosts

---

## Version history

- **3.0.0** - Field-journal redesign: paper and ink, Bodoni and Caslon (September 10, 2026)
- **2.0.0** - Modern earth-tone redesign and asset cache-busting fix (September 6, 2026)
- **1.0.0** - Initial release (November 8, 2025)

---

**Theme Author**: Wandering Gorilla
**License**: GPL-2.0-or-later
**Text Domain**: wandering-gorilla
