# Changelog

All notable changes to the Wandering Gorilla WordPress theme are documented in
this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

Work toward a redesign of the theme around the magazine direction. The version
number stays at 2.0.0 until that port actually lands, at which point it becomes
3.0.0.

### Added
- `preview-magazine.html`, a standalone design mockup of a 1956 field journal
  ("Vol III, No 7") presented as a twelve-spread page-turning book. Bodoni Moda
  display, Libre Caslon Text body, and Oswald sans on a paper-and-ink palette,
  with a halftone dot texture. Its CSS is inlined and it is not wired to
  WordPress
- `assets/images/yosemite-1953.jpg`, the cover plate for that mockup
- A `.gitignore` entry for `.claude/`, which holds local git worktrees

### Changed
- `README.md` rewritten to describe the repository as it actually is. It
  previously claimed WebP support, swipe gallery gestures, RTL stylesheets, and
  a social menu location, none of which exist in the code, and it did not
  mention the magazine preview at all
- `CHANGELOG.md` 1.0.0 entry condensed. It listed aspirations ("WCAG 2.1
  compliant", "fast loading", "cross-browser compatible") as shipped features

### Removed
- `preview-vintage.html`, `preview-modern.html`, and `preview-dark-vintage.html`.
  Three abandoned design directions, superseded by the magazine work. They
  remain in git history
- The Webflow export: `webflow-components/`, `webflow-export.html`,
  `webflow-styles.css`, and `WEBFLOW-SETUP-GUIDE.md`. Nothing in the theme
  referenced any of it, and it encoded the 1.0.0 design that 2.0.0 already
  replaced. The README had been citing it as the place social sharing and email
  signup markup "ships", which made it read like a theme feature

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

- **2.0.0** - Modern earth-tone redesign and asset cache-busting fix (September 6, 2026)
- **1.0.0** - Initial release (November 8, 2025)

---

**Theme Author**: Wandering Gorilla
**License**: GPL-2.0-or-later
**Text Domain**: wandering-gorilla
