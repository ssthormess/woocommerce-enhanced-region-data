# Enhanced Region Data for WooCommerce
Add support for missing regions, states, and provinces for 140+ countries in WooCommerce.
**Requires at least:** 5.8
**Tested up to:** 6.9
**Requires PHP:** 7.4
**Stable tag:** 1.0.0
**License:** GPLv2 or later

## Description

This plugin enhances WooCommerce by adding missing states, provinces, and regions for countries that default WooCommerce installations do not support.

It works by checking if a selected country has an empty state list in WooCommerce. If so, it injects a curated list of regions from its own data repository.

**Key Features:**
*   **Non-Destructive**: Only adds regions if WooCommerce has none. It never overrides existing WooCommerce default data.
*   **Comprehensive**: Includes region data for over 140+ countries, including many island nations, microstates, and territories often overlooked.
*   **Modular**: Each country's data is stored in a separate file (e.g., `regions/FM.php` for Micronesia), making it easy to maintain and extend.
*   **Lightweight**: Designed for performance and Bedrock compatibility.

## Installation

1.  Upload the `woocommerce-enhanced-regions-data` folder to the `/wp-content/plugins/` directory (or `web/app/plugins` in Bedrock).
2.  Activate the plugin through the 'Plugins' menu in WordPress.
3.  Ensure WooCommerce is installed and active.

## Usage

No configuration is required. Once activated, the plugin automatically filters the `woocommerce_states` hook.

If you navigate to the Checkout page or any address form and select a country like "Micronesia", "Antigua and Barbuda", or "Vietnam", you will now see a dropdown of regions instead of a plain text input (if WooCommerce didn't provide them).

## Adding/Editing Regions

To add regions for a new country or edit existing ones:
1.  Navigate to the `regions/` directory inside the plugin folder.
2.  Create or edit the PHP file named after the 2-letter Country Code (e.g., `XY.php`).
3.  The file must return a PHP associative array:
    ```php
    <?php
    return [
       'XY-CODE1' => 'Region Name 1',
       'XY-CODE2' => 'Region Name 2',
    ];
    ```
