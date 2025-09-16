# FitPro WordPress Theme

Welcome to FitPro, a modern, conversion-focused WordPress theme designed for fitness coaches, personal trainers, and health professionals.

## Theme Installation

1.  Download the theme as a `.zip` file.
2.  In your WordPress admin dashboard, navigate to **Appearance > Themes**.
3.  Click **Add New**, then **Upload Theme**.
4.  Choose the `FitPro.zip` file you downloaded and click **Install Now**.
5.  Once installed, click **Activate**.

---

## Quick Setup Guide

To make your site look like the demo, follow these steps.

### Step 1: Create Core Pages

You first need to create the essential pages for your site.

1.  In your WordPress dashboard, go to **Pages > Add New**.
2.  Create the following pages:
    *   **Home**: This will be your main landing page.
    *   **About**: Your "About Us" page.
    *   **Services**: This page will detail your offerings.
    *   **Contact**: Your contact page.
    *   **Blog**: An empty page that will be used to display your posts.

### Step 2: Assign Page Templates

For the Home, About, and Services pages, you need to assign their custom page templates.

1.  Go to **Pages** and open a page (e.g., Home) for editing.
2.  In the right-hand sidebar, under the "Page" tab, find the **Template** panel.
3.  Select the corresponding template ("Homepage", "About Page", or "Services Page") from the dropdown menu.
4.  Click **Update**.
5.  Repeat this for all three pages.

### Step 3: Set Your Static Front Page

You need to tell WordPress to use your "Home" page as the main page of your site.

1.  Go to **Settings > Reading** in your WordPress dashboard.
2.  Under "Your homepage displays", select **A static page**.
3.  For the **Homepage** dropdown, select the "**Home**" page you created.
4.  For the **Posts page**, select the "**Blog**" page you created.
5.  Save your changes.

### Step 4: Add & Manage Content

**For the Homepage, About, and Services pages:**
All content for these pages is managed in the WordPress Customizer for easy access.
1.  Go to **Appearance > Customize**.
2.  Open the **FitPro Theme Options** or **Homepage Sections** panels.
3.  Here you can edit all the text, pricing, and other content for these pages.

**For Team Members and Services:**
This theme includes custom post types for managing your team and services.
1.  In your WordPress admin menu, you will see new sections for **Team Members** and **Services**.
2.  You can add, edit, and delete items here just like regular blog posts. These will automatically appear on the About and Services pages.

**For the Contact Page:**
1.  Open your **Contact** page in the editor.
2.  Add a **Custom HTML** block.
3.  Open `demo-content/contact-page.html`, copy the content, and paste it into the block.
4.  Remember to replace the placeholder shortcode with one from your forms plugin.
5.  Click **Update** or **Publish**.

### Step 5: Configure the Navigation Menu

1.  Go to **Appearance > Menus**.
2.  **Create a new menu**.
3.  Add the pages you created to the menu.
4.  Under "Menu Settings", set the "Display location" to **Primary Menu**.
5.  **Save Menu**.

### Step 6: Add Content to the Footer

The footer is split into four widget columns. You can add any content you like to these.

1.  Go to **Appearance > Widgets**.
2.  You will see four widget areas: **Footer Column 1, 2, 3, and 4**.
3.  Click on one of the areas to open it. Click the **+** icon to add a new widget block.
4.  You can add any block you like, such as a **Paragraph** block for text, a **Navigation Menu** block for links, or a **Shortcode** block for a newsletter signup form.
5.  Add widgets to all four columns to build out your footer.

---

Thank you for using the FitPro theme!
