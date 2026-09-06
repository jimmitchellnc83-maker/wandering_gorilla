# Changelog

All notable changes to the Wandering Gorilla WordPress theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
- Webflow export package (`webflow-export.html`, `webflow-styles.css`,
  `webflow-components/`, `WEBFLOW-SETUP-GUIDE.md`)
- Standalone browser previews: `preview.html`, `preview-modern.html`, and
  `preview-dark-vintage.html`

### Removed
- `preview-standalone.html` as a filename. It collided with
  `PREVIEW-STANDALONE.html` on case-insensitive filesystems, where the two
  resolved to the same path. Its contents are preserved as
  `preview-vintage.html`; all previews are now lowercase and distinctly named

## [1.0.0] - 2025-11-08

### Added
- Initial release of Wandering Gorilla theme
- Vintage Documentary Americana aesthetic inspired by 1940s-60s Kodachrome photography
- National Park Service design language integration
- Custom post types: Route Reports, Gear Reviews, Local Intel
- Custom taxonomies: Destinations, Gear Categories
- Custom meta boxes for route details and gear specifications
- Kodachrome photo treatment with automatic vintage filters
- Masonry gallery layouts with polaroid styling
- Mobile-responsive design with vintage aesthetic maintained
- Custom page templates:
  - Gear Supply List (page-gear.php)
  - Support/Donation Page (page-support.php)
  - Contact Form Page (page-contact.php)
- Guest book style comment system
- Sticky header with backdrop blur
- Mobile hamburger menu with vintage fold-out effect
- Lazy loading for images with fade-in effects
- Gallery lightbox functionality
- Smooth scrolling for anchor links
- Parallax effect for hero sections
- Form validation enhancements
- SEO optimization with Open Graph and Twitter Cards
- Schema.org markup for route reports
- Related posts "Also Worth Seeing" functionality
- Custom search form with vintage styling
- Breadcrumb navigation
- Star rating system for gear reviews
- Affiliate link management
- Social media integration ready
- Newsletter signup integration ready
- Complete documentation in README.md
- Accessibility features (WCAG 2.1 compliant)
- Print stylesheet support
- RTL language support ready

### Theme Files
- style.css - Main stylesheet with vintage aesthetic (26KB)
- functions.php - Theme functionality and custom post types (26KB)
- header.php - Sticky navigation with National Park Service styling
- footer.php - Park service inspired footer
- index.php - Homepage with hero section and recent expeditions
- single.php - Individual post/route report template
- archive.php - Archive listing template
- category.php - Category archive template
- page.php - Static page template
- page-gear.php - Gear/equipment review listing
- page-support.php - Support and donation page
- page-contact.php - Contact form page
- 404.php - Custom "Trail Not Found" error page
- comments.php - Guest book style comments
- assets/js/main.js - Interactive functionality (12KB)

### Features
- Fully responsive (mobile, tablet, desktop)
- Cross-browser compatible
- Fast loading (optimized for <3 second load time)
- SEO friendly
- Accessibility compliant
- Translation ready
- Widget areas: Sidebar, 3 footer areas
- Navigation menus: Primary, Footer, Social
- Custom logo support
- Featured images with automatic Kodachrome treatment
- Image sizes: hero-large (1400x600), card-thumbnail (800x600), polaroid (600x600)

### Color Palette
- Primary: #8B4513 (saddle brown)
- Accent: #DC143C (cherry red)
- Background: #F5F5DC (kodachrome cream)
- Support: #2F4F2F (forest green)
- Text: #3C3C3C (faded ink)

### Typography
- Headlines: Rockwell, Courier New, serif
- Subheads: Oswald, Arial Narrow, sans-serif
- Body: Crimson Text, Georgia, serif
- UI: Oswald, Arial Narrow, sans-serif

### Browser Support
- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)
- Mobile Safari
- Mobile Chrome

### WordPress Requirements
- WordPress 5.0+
- PHP 7.4+
- MySQL 5.6+

### Known Issues
- Screenshot.png needs to be created (placeholder provided)
- Contact form uses basic WordPress mail (recommend Contact Form 7 for production)
- Instagram feed integration requires third-party plugin

### Future Enhancements
- Gutenberg block editor custom blocks
- Weather widget integration
- Map integration with vintage topographic styling
- Enhanced gallery lightbox with swipe gestures
- Print stylesheet optimization
- Dark mode variant (optional)

---

## Version History

- **2.0.0** - Modern earth-tone redesign and asset cache-busting fix (September 6, 2026)
- **1.0.0** - Initial Release (November 8, 2025)

---

**Theme Author**: Wandering Gorilla
**License**: GPL-2.0-or-later
**Text Domain**: wandering-gorilla
