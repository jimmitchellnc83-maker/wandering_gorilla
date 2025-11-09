# Wandering Gorilla - Webflow Setup Guide

## 🚀 Quick Start

This guide will help you set up the Wandering Gorilla theme in Webflow in about 15-20 minutes.

## 📋 What You'll Need

- Active Webflow account (free or paid)
- Access to your Webflow site
- The files in this package:
  - `webflow-export.html` (HTML structure reference)
  - `webflow-styles.css` (Custom CSS)

---

## Method 1: Import HTML Directly (Fastest - 5 minutes)

### Step 1: Add Custom CSS

1. In Webflow, go to **Project Settings** (gear icon)
2. Click **Custom Code**
3. In the **Head Code** section, add:

```html
<style>
[PASTE THE ENTIRE CONTENTS OF webflow-styles.css HERE]
</style>
```

4. Click **Save Changes**

### Step 2: Import HTML Structure

1. Create a new **Blank Page** in Webflow
2. Click the **</>** embed icon in the left panel
3. Drag an **Embed** element onto the page
4. Paste the contents of `webflow-export.html`
5. Click **Save & Close**

### Step 3: Publish

1. Click **Publish** in the top right
2. Select your domain
3. Click **Publish to Selected Domains**

✅ **Done!** Your site should now be live with the full design.

---

## Method 2: Build in Webflow Designer (Full Control - 15-20 minutes)

This method gives you more flexibility to edit in Webflow's visual editor.

### Step 1: Add Custom CSS

Same as Method 1 - paste `webflow-styles.css` into **Project Settings > Custom Code > Head Code**

### Step 2: Create Pages

1. Create these pages:
   - **Home** (index)
   - **Routes** (collection page)
   - **Gear** (collection page)
   - **Contact**
   - **Support**

### Step 3: Build the Navigation

1. Add a **Navbar** component
2. Style it with class: `site-header`
3. Add logo text: "🦍 Wandering Gorilla" with class: `site-logo`
4. Add nav links with class: `main-navigation`

### Step 4: Build the Hero Section

1. Add a **Section** (set height to 600px)
2. Add class: `hero-section`
3. Set background: Linear gradient or image
4. Add **Heading** (H1): "Trail to Grand Canyon's Hidden Rim"
5. Add metadata spans with class: `vintage-label`
6. Add a **Button** with class: `btn btn-secondary`

### Step 5: Create Blog Post Cards

1. Add a **Section** with class: `recent-expeditions`
2. Add **Heading** (H2): "Recent Expeditions" with class: `text-center`
3. Add a **Grid** (3 columns) with class: `grid grid-3`
4. Add **Card** elements with class: `post-card`

Each card should contain:
- **Image** wrapper: class `post-card-image`
- **Content** wrapper: class `post-card-content`
  - Badges: class `category-badge`
  - Title (H3): class `post-card-title`
  - Excerpt: class `post-card-excerpt`
  - Meta: class `post-card-meta`

### Step 6: Build the Footer

1. Add a **Section** with class: `site-footer`
2. Add a **Container** with class: `container`
3. Create 3 columns:
   - Logo + description
   - Navigation links
   - Social + CTA

---

## Method 3: Use Webflow CMS (Advanced - 30 minutes)

For dynamic content, set up Collections:

### Create Collections

1. **Routes Collection**
   - Title (Plain Text)
   - Slug (auto-generated)
   - Featured Image (Image)
   - Excerpt (Plain Text)
   - Category (Option - Mountain, Desert, Coast)
   - Content (Rich Text)
   - Date (Date)

2. **Gear Reviews Collection**
   - Product Name (Plain Text)
   - Brand (Plain Text)
   - Price (Number)
   - Rating (Number 1-5)
   - Image (Image)
   - Review (Rich Text)

### Bind Collection Data

1. Add a **Collection List** to your page
2. Select the Routes or Gear collection
3. Style the **Collection Item** with class: `post-card`
4. Bind dynamic fields:
   - Image → `post-card-image`
   - Title → `post-card-title`
   - Excerpt → `post-card-excerpt`
   - Date → within `post-card-meta`

---

## 🎨 Color Palette Reference

Use these in Webflow's color picker:

| Color Name | Hex Code | Use For |
|------------|----------|---------|
| Burnt Orange | `#C15006` | Primary buttons, accents |
| Pine Green | `#294F50` | Secondary elements |
| Warm Cream | `#F5F2ED` | Background |
| Deep Brown | `#17110F` | Text, headlines |
| Mustard | `#DBA861` | Stars, highlights |
| Dusty Teal | `#608E81` | Links, badges |
| Sage Green | `#7E835F` | Tertiary buttons |
| White | `#FFFFFF` | Cards, header |

---

## 🔤 Typography Setup

### Add Google Fonts

Already included in the custom code! But if you need to add manually:

1. Go to **Project Settings > Fonts**
2. Add these Google Fonts:
   - **Oswald** (weights: 400, 500, 600, 700)
   - **Crimson Text** (weights: 400, 600, 700, 400 italic)

### Apply Fonts

- **Headlines (H1-H6)**: Oswald
- **Body text**: Crimson Text
- **UI elements**: System font stack (already in CSS)

---

## 📱 Responsive Design

The CSS is already mobile-responsive! But check these breakpoints in Webflow:

- **Desktop**: 992px+
- **Tablet**: 768px - 991px
- **Mobile**: < 768px

Key responsive behaviors:
- Navigation collapses to hamburger menu
- Grid becomes single column
- Hero section reduces height
- Cards stack vertically

---

## ✨ Interactive Features Included

All these work automatically with the CSS:

✅ Smooth scroll animations
✅ Card hover effects (lift + scale image)
✅ Button shimmer on hover
✅ Navigation underline animation
✅ Fade-in animations on load
✅ Responsive navigation
✅ Accessibility focus states

---

## 🔍 SEO Optimization

The HTML includes:

✅ Semantic HTML5 structure
✅ Meta descriptions
✅ Open Graph tags
✅ Schema.org markup
✅ Alt text placeholders
✅ Proper heading hierarchy

### Add in Webflow

1. **Page Settings** → Add meta description
2. **SEO Settings** → Add title, OG image
3. **Custom Code** → Add Schema.org JSON-LD

---

## 🚨 Troubleshooting

### Styles not showing?

1. Make sure custom CSS is in **Head Code** (not Footer Code)
2. Clear Webflow's cache: Settings > Hosting > Clear Cache
3. Hard refresh: Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)

### Images not displaying?

Replace placeholder images with your own:
- Use Unsplash integration in Webflow
- Upload to Assets panel
- Recommended size: 800x600px minimum

### Fonts look different?

Make sure Google Fonts link is in Head Code before the style block

### Mobile menu not working?

You'll need to add Webflow's built-in Navbar component or use custom JavaScript

---

## 📦 Going Live

### Connect Your Domain

1. **Project Settings** > **Hosting**
2. Click **Add Custom Domain**
3. Enter your domain: `wanderinggorilla.com`
4. Follow DNS instructions:
   - Add A record: `75.2.70.75`
   - Add CNAME: `www` → `proxy-ssl.webflow.com`
5. Wait for DNS propagation (up to 48 hours)

### SSL Certificate

Webflow provides free SSL automatically! Just enable:
1. **Project Settings** > **Hosting**
2. Toggle **Enable SSL**

---

## 🎯 Next Steps

1. **Add Real Content**
   - Replace placeholder images
   - Write your hiking stories
   - Add gear reviews

2. **Set Up Collections**
   - Create CMS collections for routes and gear
   - Build collection pages
   - Add filtering

3. **Enhance Interactions**
   - Add Webflow interactions for parallax
   - Create custom animations
   - Add scroll-triggered effects

4. **Analytics**
   - Add Google Analytics in Custom Code
   - Set up conversion tracking
   - Monitor SEO performance

---

## 📞 Support

If you need help:

- **Webflow University**: https://university.webflow.com
- **Webflow Forum**: https://forum.webflow.com
- **CSS Reference**: Check `webflow-styles.css` for class names

---

## 🎉 You're All Set!

Your modern, SEO-optimized adventure travel site is ready to go. Start adding your amazing hiking stories and gear reviews!

**Live Preview**: Open `webflow-export.html` in any browser to see the final result.

---

*Theme Version: 3.0.0*
*Last Updated: November 2025*
