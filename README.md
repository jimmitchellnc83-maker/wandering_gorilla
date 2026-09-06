# Wandering Gorilla WordPress Theme

A modern adventure travel theme built on natural earth tones and a cactus-inspired palette. Made for route reports, gear reviews, and location notes, with a film-style photo treatment carried over from the theme's documentary roots.

![Theme Version](https://img.shields.io/badge/version-2.0.0-C15006)
![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue)
![License](https://img.shields.io/badge/license-GPL--2.0-green)

## 📸 Theme Features

### Visual Design
- **Natural Earth Palette**: Burnt orange, pine green, and warm cream, with mustard, dusty teal, and sage accents
- **Typography**: Oswald headlines and navigation paired with Crimson Text body copy
- **Film Photo Treatment**: Automatic saturation, contrast, and light sepia filtering, with an optional film grain overlay
- **Block Editor Support**: Theme color palette, editor font sizes, wide alignment, and editor styles
- **Responsive Design**: Mobile-first approach with the styling maintained across all devices

### Content Management
- **Custom Post Types**:
  - Route Reports (trip documentation)
  - Gear Reviews (equipment testing)
  - Local Intel (location-specific insights)
- **Custom Taxonomies**: Destinations and Gear Categories
- **Custom Fields**: Location data, weather conditions, gear used, ratings
- **Photo Galleries**: Masonry layouts with the film photo treatment

### Monetization Features
- Affiliate link management for gear reviews
- Donation/support page templates
- Sponsorship rate card and media kit call-to-action on the contact page
- Support page ready for Buy Me a Coffee / Venmo / PayPal links

### Interactive Elements
- Guest book style comment system
- Related posts "Also Worth Seeing" sections
- Mobile hamburger menu with click-outside and Escape handling
- Gallery lightbox, lazy image fade-in, smooth anchor scrolling
- Hero parallax that respects `prefers-reduced-motion`

Social sharing buttons and an email signup form are not built into the
WordPress theme. Markup for both ships in `webflow-components/`, and the
recommended plugins below cover them on the WordPress side.

## 📋 Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## 🚀 Installation

### Method 1: WordPress Admin Upload

1. Download the theme ZIP file
2. Log in to your WordPress admin panel
3. Navigate to **Appearance > Themes > Add New**
4. Click **Upload Theme** button
5. Choose the downloaded ZIP file
6. Click **Install Now**
7. After installation, click **Activate**

### Method 2: FTP Upload

1. Extract the theme ZIP file
2. Upload the `wandering-gorilla` folder to `/wp-content/themes/` directory
3. Log in to WordPress admin panel
4. Navigate to **Appearance > Themes**
5. Find "Wandering Gorilla" and click **Activate**

### Method 3: WP-CLI

```bash
wp theme install wandering-gorilla.zip --activate
```

## ⚙️ Initial Setup

### 1. Configure Menus

1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add pages in this order:
   - Routes (link to Route Reports archive)
   - Gear (link to Gear page)
   - Intel (link to Local Intel archive)
   - Support (link to Support page)
   - Field Notes (link to About/Contact)
4. Assign to "Primary Menu" location

### 2. Create Essential Pages

Create the following pages using the specified templates:

#### Gear Page
- **Title**: Gear
- **Template**: Gear Supply List
- **Slug**: `gear`

#### Support Page
- **Title**: Support
- **Template**: Support Page
- **Slug**: `support`

#### Contact Page
- **Title**: Contact
- **Template**: Contact Page
- **Slug**: `contact`

### 3. Configure Widgets

Navigate to **Appearance > Widgets** and add widgets to:

- **Footer Area 1**: About text, site description
- **Footer Area 2**: Navigation menu
- **Footer Area 3**: Social links, newsletter signup

### 4. Set Up Custom Post Types

After activation, you'll see new post types in your admin menu:

- **Route Reports**: Document your trips and expeditions
- **Gear Reviews**: Write equipment reviews with ratings
- **Local Intel**: Share location-specific tips and insights

### 5. Configure Permalinks

1. Go to **Settings > Permalinks**
2. Select **Post name** structure
3. Click **Save Changes**

This ensures clean URLs like:
- `/routes/grand-canyon-expedition/`
- `/gear/hiking-boots-review/`

## 📝 Creating Content

### Creating a Route Report

1. Go to **Route Reports > Add New**
2. Add your route title
3. Write your expedition content
4. Add a featured image (will be displayed with the film photo treatment)
5. Fill in Route Details meta box:
   - Location
   - Date
   - Weather Conditions
   - Distance
   - Duration
   - Gear Used
6. Assign to a Destination category
7. Publish

### Creating a Gear Review

1. Go to **Gear Reviews > Add New**
2. Add gear title (e.g., "Osprey Atmos 65 Backpack")
3. Write your review content
4. Add product photo as featured image
5. Fill in Gear Review Details:
   - Star Rating (1-5)
   - Brand
   - Price
   - Affiliate Link (optional)
6. Assign to a Gear Category
7. Publish

### Using Photo Galleries

Add styled photo galleries to any post:

```
[gallery ids="1,2,3,4,5,6"]
```

Images will automatically receive:
- Film-style color treatment (saturation, contrast, light sepia)
- White polaroid borders with soft shadows
- Masonry gallery layout
- Optional film grain texture overlay

## 🎨 Customization

### Changing Colors

Edit `style.css` and modify the CSS variables in the `:root` section:

```css
:root {
  --color-primary: #C15006; /* burnt orange */
  --color-secondary: #294F50; /* pine green */
  --color-background: #F5F2ED; /* warm cream */
  --color-text: #17110F; /* deep brown-black */
  --color-text-muted: #4B6068; /* dusty blue-gray */
}
```

If you change these, update the matching entries in the `editor-color-palette`
block in `functions.php` too, so the block editor offers the same colors.

### Adding Custom Logo

1. Go to **Appearance > Customize > Site Identity**
2. Click **Select Logo**
3. Upload your logo (recommended: 72x72px minimum)
4. The logo appears in the sticky site header

### Customizing Footer

Edit `footer.php` to modify:
- Social media links (update href attributes)
- Footer widget areas
- Copyright information

### Custom CSS

Add custom CSS via **Appearance > Customize > Additional CSS** or edit `style.css` directly.

## 🔌 Recommended Plugins

### Essential
- **Contact Form 7**: Enhanced contact forms (replace built-in form)
- **Yoast SEO**: Search engine optimization
- **Akismet**: Spam protection for guest book comments

### Optional
- **WP Super Cache**: Performance optimization
- **Smush**: Image optimization while maintaining photo quality
- **Social Warfare**: Enhanced social sharing
- **MailChimp for WordPress**: Newsletter integration
- **Instagram Feed**: Display an Instagram feed

## 🎯 SEO Setup

The theme includes built-in SEO features:

- Open Graph meta tags
- Twitter Card support
- Schema.org markup for route reports
- Semantic HTML5 markup
- Breadcrumb navigation

For best results, install **Yoast SEO** plugin.

## 📱 Mobile Optimization

The theme is fully responsive with:
- Touch-friendly navigation
- Optimized photo treatment for mobile
- Single-column responsive layout
- Fast loading with progressive image enhancement
- Swipe galleries with film strip navigation

## 🚀 Performance Optimization

### Built-in Features
- Lazy loading for images
- Minification ready (use caching plugin)
- WebP format support
- Optimized CSS/JS loading
- Image compression friendly

### Recommended Performance Steps

1. **Install a caching plugin** (WP Super Cache or W3 Total Cache)
2. **Enable GZIP compression** in your hosting control panel
3. **Use a CDN** for static assets
4. **Optimize images** before upload (keep quality high)
5. **Limit plugins** to only essential ones

## 🛠️ Troubleshooting

### Mobile Menu Not Working

If the mobile menu toggle isn't working:
1. Clear browser cache
2. Check if JavaScript is enabled
3. Ensure `assets/js/main.js` is loaded (check browser console)

### Custom Post Types Not Showing

After activating the theme:
1. Go to **Settings > Permalinks**
2. Click **Save Changes** (without making any changes)
3. This flushes the rewrite rules

### Images Not Getting Photo Treatment

Make sure images have the proper classes:
- Use featured images for automatic treatment
- Gallery shortcodes apply treatment automatically
- Manually add `kodachrome-photo` class if needed

### CSS or JS Changes Not Showing Up

The theme versions `style.css` and `assets/js/main.js` by file modification
time, so edits invalidate the browser cache on their own. If a change still
does not appear, the cache is coming from somewhere else: purge your caching
plugin or CDN, then hard reload.

### Contact Form Not Sending

The built-in contact form requires:
1. Properly configured email settings in WordPress
2. Or install **Contact Form 7** for more reliable sending

## 🔐 Security Best Practices

- Keep WordPress, theme, and plugins updated
- Use strong passwords
- Install **Wordfence Security** plugin
- Enable two-factor authentication
- Regular backups (use **UpdraftPlus**)

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.

## 🤝 Support

For theme support, customization help, or bug reports:

- **Documentation**: See this README
- **Issues**: Report bugs via GitHub Issues (if applicable)
- **Customization**: Consider hiring a WordPress developer for major modifications

## 🎨 Credits

### Fonts
- **Crimson Text**: Google Fonts
- **Oswald**: Google Fonts

### Inspiration
- Natural desert and forest earth tones
- Mid-century travel documentation and photography
- Modern editorial layout

## 📊 Theme Structure

```
wandering-gorilla/
├── assets/
│   ├── css/          (additional stylesheets)
│   ├── js/
│   │   └── main.js   (theme JavaScript)
│   └── images/       (theme images)
├── inc/              (additional PHP includes)
├── 404.php           (404 error page)
├── archive.php       (archive template)
├── category.php      (category archive)
├── footer.php        (footer template)
├── functions.php     (theme functions)
├── header.php        (header template)
├── index.php         (main template)
├── page.php          (page template)
├── page-contact.php  (contact page template)
├── page-gear.php     (gear list template)
├── page-support.php  (support page template)
├── webflow-components/          (Webflow port of the components)
├── README.md                    (this file)
├── CHANGELOG.md                 (release notes)
├── single.php                   (single post template)
├── style.css                    (main stylesheet)
├── preview.html                 (browser preview, links style.css)
├── preview-modern.html          (standalone preview, current design)
├── preview-dark-vintage.html    (standalone preview, dark vintage variant)
├── webflow-export.html          (Webflow export markup)
├── webflow-styles.css           (Webflow export styles)
├── WEBFLOW-SETUP-GUIDE.md       (Webflow setup instructions)
└── screenshot.txt               (placeholder; replace with screenshot.png)
```

## 👀 Previewing Without WordPress

Open `preview.html` in a browser to see the current design rendered against the
live `style.css`. `preview-modern.html` and `preview-dark-vintage.html` are
self-contained snapshots with their CSS inlined, useful for sharing a look
without the rest of the theme.

## 🎯 Roadmap

Future enhancements planned:
- Custom block editor blocks (color palette and font sizes are already registered)
- Additional page templates
- Weather widget integration
- Map integration
- Enhanced gallery lightbox
- Print stylesheet optimization
- A real `screenshot.png` to replace the placeholder

## 🙏 Acknowledgments

Created for adventurers, documentarians, and those who appreciate the authentic aesthetic of mid-century American exploration.

---

**Version**: 2.0.0
**Last Updated**: 2026
**Author**: Wandering Gorilla
**WordPress Version**: 5.0+
**PHP Version**: 7.4+

---

Happy documenting! 🏔️📷🥾
