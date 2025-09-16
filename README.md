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

For the About and Services pages, you need to assign their custom page template.

1.  Go to **Pages** and open the **About** page for editing.
2.  In the right-hand sidebar, under the "Page" tab, find the **Template** panel.
3.  Select **"About Page"** from the dropdown menu.
4.  Click **Update**.
5.  Repeat this process for the **Services** page, selecting the **"Services Page"** template.

### Step 3: Set Your Static Front Page

You need to tell WordPress to use your "Home" page as the main page of your site.

1.  Go to **Settings > Reading** in your WordPress dashboard.
2.  Under "Your homepage displays", select **A static page**.
3.  For the **Homepage** dropdown, select the "**Home**" page you created.
4.  For the **Posts page**, select the "**Blog**" page you created.
5.  Save your changes.

### Step 4: Add Demo Content

**For the Homepage:**
1. Open your **Home** page in the WordPress editor.
2. Add a single **Custom HTML** block to the page.
3. Open the file `demo-content/homepage-content.html` in a text editor.
4. Copy the entire content of the file and paste it into the Custom HTML block.
5. Click **Update** or **Publish**.

**For the Contact Page:**
1. Open your **Contact** page in the editor.
2. Add a **Custom HTML** block.
3. Open `demo-content/contact-page.html`, copy the content, and paste it into the block.
4. Remember to replace the placeholder shortcode with one from your forms plugin.
5. Click **Update** or **Publish**.

### Step 5: Configure Content in the Customizer

The content for the **About** and **Services** pages is controlled via the Customizer for easy access.

1.  Go to **Appearance > Customize**.
2.  Open the **FitPro Theme Options** panel.
3.  You will find sections for **About Page Content** and **Services Page Content**. Open these sections to edit all the text and pricing information for these pages.
4.  You can also change the **Accent Color**, **Heading Font**, and **Footer Copyright Text** in the other sections.
5.  Upload your own logo under **Site Identity > Logo**.

### Step 6: Configure the Navigation Menu

1.  Go to **Appearance > Menus**.
2.  **Create a new menu**.
3.  Add the pages you created (Home, About, Services, Contact, Blog) to the menu.
4.  Under "Menu Settings", set the "Display location" to **Primary Menu**.
5.  **Save Menu**.

---

Thank you for using the FitPro theme!
