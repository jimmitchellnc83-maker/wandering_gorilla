# Wandering Gorilla WordPress Theme

A vintage Documentary Americana theme inspired by 1940s-60s Kodachrome photography and National Park Service design. Perfect for travel documentation blogs with authentic retro aesthetics.

![Theme Version](https://img.shields.io/badge/version-1.0.0-8B4513)
![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue)
![License](https://img.shields.io/badge/license-GPL--2.0-green)

## 📸 Theme Features

### Visual Design
- **Vintage Color Palette**: Authentic 1940s-60s inspired colors including saddle brown, cherry red, and kodachrome cream
- **Retro Typography**: Classic slab serif headlines with condensed sans-serif navigation
- **Kodachrome Photo Treatment**: Automatic vintage photo filters with film grain effects
- **National Park Service Aesthetic**: Government document and park ranger report styling
- **Responsive Design**: Mobile-first approach with vintage styling maintained across all devices

### Content Management
- **Custom Post Types**:
  - Route Reports (trip documentation)
  - Gear Reviews (equipment testing)
  - Local Intel (location-specific insights)
- **Custom Taxonomies**: Destinations and Gear Categories
- **Custom Fields**: Location data, weather conditions, gear used, ratings
- **Photo Galleries**: Masonry layouts with Kodachrome treatment

### Monetization Features
- Affiliate link management for gear reviews
- Donation/support page templates
- Sponsorship rate card integration
- Media kit functionality
- Buy Me a Coffee / Venmo integration ready

### Interactive Elements
- Guest book style comment system
- Vintage travel sticker social sharing
- Related posts "Also Worth Seeing" sections
- Email signup forms with vintage postcard design
- Mobile hamburger menu with vintage fold-out effect

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
4. Add a featured image (will be displayed with Kodachrome treatment)
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

Add vintage-styled photo galleries to any post:

```
[gallery ids="1,2,3,4,5,6"]
```

Images will automatically receive:
- Kodachrome color treatment
- Cream-colored borders
- Polaroid-style layouts
- Film grain texture overlay

## 🎨 Customization

### Changing Colors

Edit `style.css` and modify the CSS variables in the `:root` section:

```css
:root {
  --color-primary: #8B4513; /* saddle brown */
  --color-accent: #DC143C; /* cherry red */
  --color-background: #F5F5DC; /* kodachrome cream */
  --color-support: #2F4F2F; /* forest green */
  --color-text: #3C3C3C; /* faded ink */
}
```

### Adding Custom Logo

1. Go to **Appearance > Customize > Site Identity**
2. Click **Select Logo**
3. Upload your logo (recommended: 72x72px minimum)
4. The logo will appear with the vintage National Park Service arrowhead treatment

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
- **Smush**: Image optimization while maintaining Kodachrome quality
- **Social Warfare**: Enhanced social sharing
- **MailChimp for WordPress**: Newsletter integration
- **Instagram Feed**: Display Instagram with vintage filters

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
4. **Optimize images** before upload (keep vintage quality)
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

### Images Not Getting Kodachrome Treatment

Make sure images have the proper classes:
- Use featured images for automatic treatment
- Gallery shortcodes apply treatment automatically
- Manually add `kodachrome-photo` class if needed

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
- 1940s-60s Kodachrome photography
- National Park Service design language
- Vintage travel documentation aesthetic
- Documentary Americana style

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
├── README.md         (this file)
├── single.php        (single post template)
├── style.css         (main stylesheet)
└── screenshot.png    (theme screenshot)
```

## 🎯 Roadmap

Future enhancements planned:
- Block editor (Gutenberg) custom blocks
- Additional page templates
- Weather widget integration
- Map integration with vintage topographic styling
- Enhanced gallery lightbox
- Print stylesheet optimization

## 🙏 Acknowledgments

Created for adventurers, documentarians, and those who appreciate the authentic aesthetic of mid-century American exploration.

---

**Version**: 1.0.0
**Last Updated**: 2025
**Author**: Wandering Gorilla
**WordPress Version**: 5.0+
**PHP Version**: 7.4+

---

Happy documenting! 🏔️📷🥾
