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

### Step 2: Set Your Static Front Page

You need to tell WordPress to use your "Home" page as the main page of your site.

1.  Go to **Settings > Reading** in your WordPress dashboard.
2.  Under "Your homepage displays", select **A static page**.
3.  For the **Homepage** dropdown, select the "**Home**" page you created.
4.  For the **Posts page**, select the "**Blog**" page you created.
5.  Save your changes.

### Step 3: Add Demo Content to Pages

This theme comes with high-quality demo content to get you started quickly. The content is located in the `demo-content` folder of the theme.

**For the Homepage:**
1. Open your **Home** page in the WordPress editor.
2. Add a single **Custom HTML** block to the page.
3. Open the file `demo-content/homepage-content.html` in a text editor.
4. Copy the entire content of the file and paste it into the Custom HTML block.
5. Click **Update** or **Publish**.

**For Other Pages (About, Services, Contact):**
1. Open the page (e.g., About) in the WordPress editor.
2. Add a **Custom HTML** block.
3. Open the corresponding file (`demo-content/about-page.html`, etc.) and copy/paste the content.
4. Click **Update** or **Publish**.

### Step 4: Configure the Navigation Menu

1.  Go to **Appearance > Menus**.
2.  Click **create a new menu**. Give it a name (e.g., "Main Menu") and click **Create Menu**.
3.  On the left, select the pages you want to add to your menu (Home, About, Services, Contact, Blog) and click **Add to Menu**.
4.  Drag and drop the menu items to arrange them in your desired order.
5.  Under "Menu Settings" at the bottom, check the box for **Primary Menu** in the "Display location" section.
6.  Click **Save Menu**.

### Step 5: Customize Your Theme

You can change the theme's appearance in the WordPress Customizer.

1.  Go to **Appearance > Customize**.
2.  In the "FitPro Theme Options" panel, you can:
    *   Change the **Accent Color**.
    *   Select a new **Heading Font**.
    *   Update the **Footer Copyright Text**.
3.  You can also upload your own logo under **Site Identity > Logo**.

### Step 6: Making Forms Functional

The theme includes several demo forms. To make these functional, you need to use a forms plugin.

1.  Install and activate a plugin like **WPForms** or **Contact Form 7**.
2.  Create a new form within the plugin.
3.  Copy the shortcode provided by the plugin.
4.  Paste the shortcode into your pages to replace the placeholder HTML form markup.

---

Thank you for using the FitPro theme!
