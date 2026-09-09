# Wandering Gorilla WordPress Theme

A WordPress theme for an adventure travel blog, built around route reports, gear
reviews, and location notes.

![Theme Version](https://img.shields.io/badge/version-2.0.0-C15006)
![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue)
![License](https://img.shields.io/badge/license-GPL--2.0-green)

## Current state of this repository

Two things live here, and they do not currently look alike:

1. **The WordPress theme** (all the `.php` files, `style.css`, `assets/`). This
   is version 2.0.0 and renders in the "modern adventure travel" direction:
   natural earth tones on a cactus-inspired palette, Oswald headlines over
   Crimson Text body copy.

2. **`preview-magazine.html`**, a standalone design mockup with its CSS inlined.
   It is the intended next direction for the theme: a 1956 field journal
   ("Vol III, No 7") in Bodoni Moda, Libre Caslon Text, and Oswald on a
   paper-and-ink palette. It is not wired to WordPress and shares only one font
   with the live theme.

Porting the magazine design into the theme is in progress. Until that lands, the
site does not render in the magazine's visual language. See
[CHANGELOG.md](CHANGELOG.md) for what has been done so far.

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## What the theme actually provides

### Content types

Registered in `functions.php`:

- **Custom post types**: Route Reports (`route_report`), Gear Reviews
  (`gear_review`), Local Intel (`local_intel`)
- **Custom taxonomies**: Destinations (`destination`), Gear Categories
  (`gear_category`)
- **Custom meta boxes**: route details (location, date, weather, distance,
  duration, gear used) and gear review details (star rating, brand, price,
  affiliate link)

### Templates

| File | Role |
| --- | --- |
| `index.php` | Home and blog index, with hero and recent posts |
| `single.php` | Single post and route report |
| `archive.php` | Archive listing |
| `category.php` | Category archive |
| `page.php` | Static page |
| `page-gear.php` | Page template: Gear Supply List |
| `page-support.php` | Page template: Support Page |
| `page-contact.php` | Page template: Contact Page |
| `comments.php` | Guest book style comments |
| `404.php` | Not Found page |
| `header.php`, `footer.php` | Shared chrome |

### Theme support

- Menu locations: `primary`, `footer`
- Widget areas: Sidebar, Footer Area 1, Footer Area 2, Footer Area 3
- Image sizes: `hero-large` (1400x600), `card-thumbnail` (800x600),
  `polaroid` (600x600)
- `title-tag`, `post-thumbnails`, `custom-logo`, `automatic-feed-links`,
  `responsive-embeds`
- Block editor: `editor-styles`, `wp-block-styles`, `align-wide`,
  `editor-color-palette`, `editor-font-sizes`
- Translation ready, text domain `wandering-gorilla`

### Front-end behaviour

In `assets/js/main.js` and `style.css`:

- Mobile hamburger menu with click-outside and Escape handling
- Gallery lightbox with Escape and click-to-close
- Lazy image loading with fade-in on scroll
- Smooth anchor scrolling that also moves focus
- Hero parallax, suppressed under `prefers-reduced-motion`
- Client-side contact form validation
- Film-style photo treatment (saturation, contrast, light sepia) with white
  polaroid borders and an optional grain overlay
- A print stylesheet

### SEO

`functions.php` outputs Open Graph and Twitter Card meta tags, Schema.org markup
for route reports, and a breadcrumb trail rendered in `header.php`.

### Not included

These need a plugin. The theme does not implement them:

- Social sharing buttons
- Email newsletter signup
- Contact form delivery beyond `wp_mail()`
- WebP conversion, swipe gallery gestures, and RTL stylesheets

## Installation

### WordPress admin upload

1. Build a ZIP of this directory
2. Go to **Appearance > Themes > Add New > Upload Theme**
3. Choose the ZIP, click **Install Now**, then **Activate**

### FTP

1. Upload this directory to `/wp-content/themes/wandering-gorilla/`
2. Go to **Appearance > Themes** and activate "Wandering Gorilla"

### WP-CLI

```bash
wp theme install wandering-gorilla.zip --activate
```

## Setup after activation

1. **Flush permalinks.** Go to **Settings > Permalinks**, choose **Post name**,
   and click **Save Changes**. The custom post types will 404 until you do this.
2. **Create the menu.** **Appearance > Menus**, build a menu, assign it to the
   **Primary Menu** location.
3. **Create the templated pages.** Add a page for each of Gear, Support, and
   Contact, and set its template to Gear Supply List, Support Page, and Contact
   Page respectively.
4. **Fill the widget areas** under **Appearance > Widgets**.

## Customization

### Colors

The palette lives in the `:root` block at the top of `style.css`:

```css
:root {
  --color-primary: #C15006;    /* burnt orange */
  --color-secondary: #294F50;  /* pine green */
  --color-background: #F5F2ED; /* warm cream */
  --color-text: #17110F;       /* deep brown-black */
  --color-text-muted: #4B6068; /* dusty blue-gray */
}
```

If you change these, update the matching entries in the `editor-color-palette`
block in `functions.php` so the block editor offers the same colors.

### Cache busting

`style.css` and `assets/js/main.js` are enqueued through
`wandering_gorilla_asset_version()`, which appends each file's modification time
to the theme version. Edits invalidate the browser cache on their own. If a
change still does not appear, purge your caching plugin or CDN.

## Previewing without WordPress

- **`preview.html`** links the live `style.css`, so it shows the real theme as it
  currently stands. Open it in a browser after editing `style.css` to check your
  work.
- **`preview-magazine.html`** is self-contained, with its CSS inlined. It is a
  design mockup for the direction the theme is moving toward, not a rendering of
  the theme.

## Repository layout

```
wandering-gorilla/
|- assets/
|  |- images/
|  |  `- yosemite-1953.jpg   (cover plate for the magazine preview)
|  `- js/
|     `- main.js
|- 404.php
|- archive.php
|- category.php
|- comments.php
|- footer.php
|- functions.php
|- header.php
|- index.php
|- page.php
|- page-contact.php
|- page-gear.php
|- page-support.php
|- single.php
|- style.css
|- preview.html              (live preview, links style.css)
|- preview-magazine.html     (design mockup, CSS inlined)
|- screenshot.txt            (placeholder; replace with screenshot.png)
|- CHANGELOG.md
`- README.md
```

## Known gaps

- `screenshot.png` does not exist. `screenshot.txt` is a placeholder describing
  what it should show.
- The theme and `preview-magazine.html` are two different designs. Reconciling
  them is the current work.
- The contact form sends through `wp_mail()`, which is unreliable on many hosts.
  Use Contact Form 7 or an SMTP plugin in production.

## Credits

Fonts are loaded from Google Fonts: Oswald and Crimson Text for the theme;
Bodoni Moda, Libre Caslon Text, and Oswald for the magazine preview.

## License

GNU General Public License v2 or later. See
<http://www.gnu.org/licenses/gpl-2.0.html>.

---

**Version**: 2.0.0
**Author**: Wandering Gorilla
**Text Domain**: wandering-gorilla
