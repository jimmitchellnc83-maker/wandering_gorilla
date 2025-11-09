# Wandering Gorilla - Webflow Component Package
## Complete Setup Guide for Vintage Americana Travel Blog

Version: 1.0.0
Last Updated: November 2025

---

## 📦 Package Contents

This package contains 10+ custom components for building a vintage americana travel blog in Webflow with e-commerce capabilities.

### Components Included:

1. **01-site-wide-custom.css** - Base styling framework
2. **02-hero-section.html** - Vintage photo hero with typewriter effect
3. **03-blog-gallery.html** - Masonry photo gallery with lightbox
4. **04-gear-review.html** - Product review cards with ratings
5. **05-email-signup.html** - Vintage postcard signup form
6. **06-donation-component.html** (see below)
7. **07-navigation-enhancements.html** (see below)
8. **08-contact-form.html** (see below)
9. **09-performance-optimization.js** (see below)
10. **10-analytics-seo.html** (see below)

---

## 🚀 Quick Start (15 Minutes)

### Step 1: Add Site-Wide CSS

1. Open your Webflow project
2. Go to **Project Settings** (gear icon)
3. Click **Custom Code**
4. In the **Head Code** section, add:

```html
<style>
[PASTE ENTIRE CONTENTS OF 01-site-wide-custom.css HERE]
</style>
```

5. Click **Save Changes**

### Step 2: Add Google Fonts

Still in **Head Code**, add BEFORE the custom CSS:

```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
```

### Step 3: Create Your Homepage

1. Create a new **Blank Page** or use existing homepage
2. Add a **Section** for hero
3. Inside the section, add an **Embed** element
4. Paste the contents of **02-hero-section.html**
5. Replace `IMAGE_URL` with your actual image
6. Customize headline text

### Step 4: Add Components

For each component you want to use:

1. Add a **Section** where you want the component
2. Add an **Embed** element inside
3. Paste the component HTML code
4. Customize content (images, text, links)
5. Adjust styling if needed

### Step 5: Publish

1. Click **Publish** in top right
2. Select your domain
3. Click **Publish to Selected Domains**

---

## 🎨 Color Palette Reference

Use these exact hex codes for consistency:

| Element | Color | Hex Code |
|---------|-------|----------|
| Primary Background | Dark Weathered Wood | `#3A342E` |
| Content Background | Aged Barn Interior | `#4A433C` |
| Text | Cream | `#E8E3D6` |
| Headlines | Warm Amber | `#D4935A` |
| Accent | Dusty Taupe | `#8B7A6B` |
| Support | Dark Sage Green | `#5D6B4F` |
| Interactive/Buttons | Weathered Bronze | `#A67B5B` |
| Dark Bronze | Darker Bronze | `#6B5A4A` |
| Leather | Worn Leather | `#5D4E3C` |

---

## 📱 Component Details

### 1. Site-Wide CSS

**Purpose**: Base styling for entire site
**Installation**: Project Settings > Custom Code > Head Code
**Includes**:
- Typography system
- Button styles
- Form styles
- Card layouts
- Vintage photo treatment
- Responsive breakpoints
- Print styles

**Customization**:
- Adjust CSS variables in `:root` section
- Modify font families if needed
- Change spacing values
- Adjust shadow effects

---

### 2. Hero Section

**Purpose**: Large hero banner with vintage photo treatment
**Installation**: Embed element on homepage
**Features**:
- Kodachrome-style photo filter
- Typewriter effect for headline
- Animated CTA button
- Responsive scaling

**Customization**:
```javascript
// Change headline text (line 86)
const text = "Your Custom Headline Here";
```

**Image Recommendations**:
- Size: 1920x1080px minimum
- Format: JPG for photos
- Quality: 80-90%
- Subject: Landscapes work best

---

### 3. Blog Photo Gallery

**Purpose**: Showcase trip photos with vintage styling
**Installation**: Embed on blog posts
**Features**:
- Masonry grid layout
- Full-screen lightbox
- Keyboard navigation (←  → ESC)
- Touch/swipe support
- Field report captions

**Customization**:
```html
<!-- Add more photos (copy this block) -->
<div class="gallery-item" data-index="6">
  <img src="YOUR_IMAGE.jpg" alt="Description">
  <div class="photo-caption">Your caption here</div>
</div>
```

**Image Recommendations**:
- Size: 800-1200px width
- Format: JPG (compressed)
- Keep under 200KB each
- Use descriptive alt text for SEO

---

### 4. Gear Review Cards

**Purpose**: Display product reviews with ratings
**Installation**: Embed on gear review pages
**Features**:
- 5-star rating system
- "Field Tested" stamps
- Price tags with retro styling
- Affiliate link support
- Product specifications
- Comparison capability

**Customization**:

**Star Rating**:
```html
<!-- 4 stars -->
<div class="star-rating">
  <span class="star filled">★</span>
  <span class="star filled">★</span>
  <span class="star filled">★</span>
  <span class="star filled">★</span>
  <span class="star">☆</span>
  <span class="rating-text">4.0</span>
</div>
```

**Affiliate Links**:
Replace `https://example.com/affiliate` with your actual affiliate URLs.

**Tracking**:
The component includes Google Analytics tracking. Customize on line 350+.

---

### 5. Email Signup (Postcard Design)

**Purpose**: Collect email subscribers
**Installation**: Footer, sidebar, or dedicated section
**Features**:
- Vintage postcard aesthetic
- Email validation
- GDPR consent checkbox
- Thank you animation
- Spam protection (honeypot)

**Email Service Integration**:

**For Mailchimp**:
1. Get your form action URL from Mailchimp
2. Replace `MAILCHIMP_ACTION_URL` on line 25
3. Example format: `https://yoursite.us1.list-manage.com/subscribe/post?u=XXX&id=YYY`

**For ConvertKit**:
1. Get your form embed code
2. Replace the form action URL
3. Update field names if needed

**Customization**:
```javascript
// Change auto-reset time (line 285)
}, 8000); // 8 seconds - change as needed
```

---

## 🔧 Advanced Customization

### Changing Fonts

1. Choose fonts from Google Fonts
2. Add link in **Head Code**
3. Update CSS variables:

```css
:root {
  --font-headline: "Your Font", sans-serif;
  --font-body: "Your Font", serif;
}
```

### Adjusting Colors

Modify the `:root` variables in `01-site-wide-custom.css`:

```css
:root {
  --color-primary-bg: #YourColor;
  --color-headline: #YourColor;
  /* etc. */
}
```

### Responsive Breakpoints

Default breakpoints:
- Desktop: 992px+
- Tablet: 768px - 991px
- Mobile: < 768px
- Mobile Small: < 480px

Modify in media queries throughout CSS.

---

## 📊 SEO & Performance

### Meta Tags

Add to **Page Settings** for each page:

```html
<title>Your Page Title - Wandering Gorilla</title>
<meta name="description" content="Your page description">
<meta name="keywords" content="hiking, backpacking, adventure">
```

### Open Graph Tags

Add to **Custom Code** > **Head Code**:

```html
<meta property="og:title" content="Your Page Title">
<meta property="og:description" content="Your description">
<meta property="og:image" content="URL_TO_IMAGE.jpg">
<meta property="og:url" content="https://yoursite.com">
```

### Schema.org Markup

Add structured data for blog posts:

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "Your Post Title",
  "image": "URL_TO_IMAGE.jpg",
  "datePublished": "2025-11-09",
  "author": {
    "@type": "Person",
    "name": "Your Name"
  }
}
</script>
```

### Performance Tips

1. **Compress Images**:
   - Use TinyPNG or similar
   - Target 100-200KB per image
   - Use WebP format when possible

2. **Enable Webflow Optimization**:
   - Project Settings > Publishing > Enable minification
   - Enable image optimization

3. **Lazy Loading**:
   - Images load automatically with lazy loading
   - Add `loading="lazy"` to custom images

---

## 🛒 E-Commerce Setup

### Webflow E-Commerce

1. Enable **E-Commerce** in project settings
2. Create **Product** collections
3. Use gear review cards as templates
4. Link to Webflow checkout

### External E-Commerce (Shopify/WooCommerce)

1. Use affiliate links in gear reviews
2. Embed buy buttons from your platform
3. Track with affiliate script (included)

---

## 📧 Email Integration Guide

### Mailchimp Setup

1. Create account at mailchimp.com
2. Create new audience
3. Design signup form
4. Copy form action URL
5. Paste into component line 25

### ConvertKit Setup

1. Create account at convertkit.com
2. Create new form
3. Get form code
4. Replace form action in component

### Custom Backend

Replace form submission function (line 225):

```javascript
function submitToEmailService(email) {
  fetch('https://yourapi.com/subscribe', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email: email })
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) showThankYou();
  });
}
```

---

## 💰 Donation Component

```html
<!-- Coming in next file: 06-donation-component.html -->
```

Features:
- Multiple donation amounts
- Vintage cash register aesthetic
- PayPal/Venmo integration
- Progress tracking
- Supporter wall

---

## 🎯 Analytics Integration

### Google Analytics 4

Add to **Custom Code** > **Head Code**:

```html
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

### Tracking Events

Affiliate clicks are tracked automatically. Add custom events:

```javascript
gtag('event', 'custom_event', {
  'event_category': 'Category',
  'event_label': 'Label'
});
```

---

## 🐛 Troubleshooting

### Styles Not Showing

1. Check if CSS is in Head Code (not Footer)
2. Verify style tags are present: `<style></style>`
3. Clear Webflow cache: Settings > Hosting > Clear Cache
4. Hard refresh browser: Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)

### Images Not Loading

1. Check image URLs are correct
2. Verify images are publicly accessible
3. Check image file size (under 5MB)
4. Use proper image formats (JPG, PNG, WebP)

### JavaScript Not Working

1. Check browser console for errors (F12)
2. Verify script tags are present
3. Check for conflicts with other scripts
4. Test in incognito mode

### Mobile Issues

1. Test on real devices, not just desktop resize
2. Check responsive breakpoints in CSS
3. Verify touch events are working
4. Test on iOS and Android

---

## 📱 Responsive Design

All components are mobile-responsive by default.

### Testing Checklist:

- [ ] Desktop (1920px)
- [ ] Laptop (1440px)
- [ ] Tablet (768px)
- [ ] Mobile (375px)
- [ ] Test all interactive elements
- [ ] Check image scaling
- [ ] Verify button sizes
- [ ] Test form inputs

---

## ✅ Launch Checklist

Before going live:

- [ ] All components installed
- [ ] Images optimized
- [ ] Forms tested
- [ ] Email signup working
- [ ] Affiliate links correct
- [ ] Analytics installed
- [ ] SEO meta tags added
- [ ] Mobile tested
- [ ] Speed test passed (< 3s load)
- [ ] SSL certificate active
- [ ] 404 page created
- [ ] Social media links working

---

## 🆘 Support Resources

- **Webflow University**: https://university.webflow.com
- **Webflow Forum**: https://forum.webflow.com
- **Component Documentation**: See individual files
- **CSS Reference**: MDN Web Docs

---

## 📄 License

This theme package is provided for use with Webflow projects.
Attribution appreciated but not required.

---

## 🔄 Updates

Version 1.0.0 (November 2025)
- Initial release
- 10 core components
- Complete documentation

---

**Need Help?**

Check component comments for inline documentation.
Each HTML file contains detailed setup instructions.

**Ready to Build!**

Start with the hero section and add components as needed.
Customize colors, fonts, and content to match your brand.

Happy building! 🦍⛰️
