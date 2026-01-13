# CDN PHP Project

## Overview
This project provides a simple, PHP-based system for creating a private Content Delivery Network (CDN) for static assets. It features a custom homepage, a secure 404 error page, and a `.htaccess` configuration that only serves existing files.

It is designed to be managed using Tiny File Manager (TFM), which can be easily integrated to handle the uploading and organization of files within an `assets/` directory.

## Features
* **Custom Homepage:** A professional landing page (`index.php`) for the root domain.
* **Custom 404 Page:** A styled "File Not Found" page (`404.php`) is shown for any missing resources.
* **Secure Routing:** The `.htaccess` file is configured to:
    * Prevent directory browsing (`Options -Indexes`).
    * Rewrite all requests for non-existent files and directories to the custom `404.php` page.
* **File Management:** Designed for integration with Tiny File Manager (TFM) for easy asset management.
* **Password Utility:** Includes instructions for a secure password hash generator for TFM setup.

## File Structure
Here is the recommended file structure for the complete project:

<pre>
/
├── .htaccess           # <-- Apache routing and security rules
├── index.php           # <-- The main project landing page
├── 404.php             # <-- The custom "Not Found" error page
│
├── assets/             # <-- (Create this) Your CDN files (images, css, js) go here
│   ├── image.jpg
│   └── styles.css
│
├── manager/            # <-- (Create this) For TFM
│   ├── index.php       # <-- The tinyfilemanager.php file (renamed)
│   └── ...
│
└── hash_generator.php  # <-- (Temporary) Tool to create passwords
</pre>


## Step-by-Step Configuration
Follow these steps to set up the complete project.

### Step 1: Upload Core Files
Upload the three files you provided to the root of your server (`public_html` or `www`):
* `.htaccess`
* `index.php`
* `404.php`

### Step 2: Create the assets Directory
Create a new, empty folder in your server's root named `assets`. This is where your CDN files will be stored and served from.

### Step 3: Set Up Tiny File Manager (TFM)
* Go to the Tiny File Manager GitHub repository and download the single `tinyfilemanager.php` file.
* Create a new directory in your server's root named `manager`.
* Upload the `tinyfilemanager.php` file into this new `manager/` directory.
* (Recommended) Rename `tinyfilemanager.php` to `index.php` inside the `manager/` directory. This lets you access it at `your-domain.com/manager/`.

### Step 4: Configure TFM Settings
You must edit the TFM file (`/manager/index.php`) to configure its settings.

* **Set the Root Path:** Find the `$root_path` variable and change it to point to your `assets` folder.
    ```php
    // ~ line 80
    $root_path = $_SERVER['DOCUMENT_ROOT'] . '/assets';
    ```
	
* **Set the Root URL:** **(This is the fix for broken links)**. Find the `$root_url` variable (right after `$root_path`) and change it to point to your public `assets` folder path. This tells TFM how to build the public URL when you copy a link.
    ```php
    // ~ line 84
    $root_url = '/assets';
    ```	
	
	
* **Set Your Passwords:** Find the `$auth_users` variable. You must replace the default passwords with your own secure, hashed passwords.
    ```php
    // ~ line 40
    $auth_users = array(
        'admin' => 'PASTE-YOUR-NEW-HASH-HERE',
        'user' => 'PASTE-ANOTHER-HASH-HERE'
    );
    ```

### Step 5: Generate Secure Passwords
To create secure hashes, use the following steps:
* Create a new file in your root directory named `hash_generator.php`.
* Copy and paste the code below into this file.
* Access the file in your browser (e.g., `your-domain.com/hash_generator.php`).
* Enter your desired password and click "Generate".
* Copy the resulting hash (it will look like `$2y$10$...`) and paste it into the `$auth_users` array in TFM (see Step 4).

> **!! IMPORTANT !!** Delete the `hash_generator.php` file from your server immediately after use.

### Step 6: Update .htaccess for TFM
Finally, you must update your `.htaccess` file to create an exception for the `/manager/` directory. This prevents TFM from being redirected to the 404 page.

## How It Works
With this setup, your server will behave as follows:

* `your-domain.com/`
    * Shows the custom `index.php` homepage.
* `your-domain.com/assets/image.jpg`
    * If the file exists, it is served directly to the browser.
* `your-domain.com/manager/`
    * The `.htaccess` rule sees `!^/manager/` is false, stops processing, and loads TFM.
* `your-domain.com/missing-file`
    * The request is not a file (`!-f`) and not a directory (`!-d`).
    * The request does not start with `/manager/`.
    * All conditions are met, and the request is rewritten to `404.php`.
	
	

	
