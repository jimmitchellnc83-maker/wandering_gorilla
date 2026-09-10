# Wandering Gorilla, WordPress Theme

## What this is
A classic (non-block) WordPress theme. The `style.css` header declares
`Version: 2.0.0`, text domain `wandering-gorilla`.

Note a live discrepancy in the design brief: the `style.css` theme header describes
"modern adventure travel, natural earth tones, cactus-inspired palette", while
`README.md` describes vintage documentary Americana / 1940s-60s Kodachrome and badges
the theme as 1.0.0. `DARK-VINTAGE-PREVIEW.html` follows the vintage direction. Confirm
which brief applies before making design changes; do not assume.
`WEBFLOW-SETUP-GUIDE.md` covers the parallel Webflow export.

## Build system
There is none. No package.json, no composer.json, no bundler, no test suite, no linter,
no CI. PHP files are the deliverable; `style.css` is hand-authored. Do not introduce a
build step or a dependency manager without being asked.

## Layout
- `style.css`            the entire stylesheet (~40 KB) plus the WP theme header block
- `functions.php`        theme setup, enqueues, custom post types (`route_report`,
                         `gear_review`, `local_intel`), taxonomies (`destination`,
                         `gear_category`), meta boxes, widgets, gallery shortcode,
                         breadcrumbs, comment callback, pagination, SEO meta tags,
                         schema markup
- `index.php` `single.php` `page.php` `archive.php` `category.php` `404.php`
                         template hierarchy
- `page-contact.php` `page-gear.php` `page-support.php`  page templates
- `header.php` `footer.php` `comments.php`  partials
- `assets/js/main.js`    front-end JS (~12 KB)
- `webflow-components/` `webflow-export.html` `webflow-styles.css`
                         standalone Webflow port, not loaded by WordPress
- `preview*.html` `DARK-VINTAGE-PREVIEW.html` `PREVIEW-STANDALONE.html`
                         static design previews, not loaded by WordPress

There is no `assets/images/` directory and no template references one. Add it only if a
change actually needs it.

## Conventions
- All PHP functions are prefixed `wandering_gorilla_`.
- `functions.php` guards with `if (!defined('ABSPATH')) { exit; }`. The template files
  currently do not. If you add the guard to a template, that is an improvement, but it
  is not the existing pattern, so do not describe it as one.
- Assets are enqueued in `wandering_gorilla_scripts()` with hardcoded version strings
  (`'1.0.0'`), which are now out of step with the `2.0.0` theme header. There is no
  asset-version helper function. If cache-busting matters for a change, propose
  replacing the hardcoded strings with a `filemtime()`-based helper rather than bumping
  them by hand.
- User-facing strings go through `__()` / `_e()` with the `wandering-gorilla` text
  domain. Coverage is good in `functions.php` and the page templates, thinner in
  `header.php`, `footer.php`, and `page.php`.
- Escape on output: `esc_url()`, `esc_attr()`, `esc_html()`.

## Verifying changes
There is no test suite. Validate PHP syntax on every file you touch:

    php -l functions.php

Or all of them at once:

    for f in *.php; do php -l "$f"; done

The `.php` templates cannot be rendered without a WordPress install, so review template
logic by reading it. To eyeball design changes, serve the repo statically and open the
preview HTML files:

    python3 -m http.server 8787

## Deployment
Copy or zip the theme directory into `wp-content/themes/wandering-gorilla` on the target
WordPress site, then activate. There is no CI and no deploy automation in this repo.
