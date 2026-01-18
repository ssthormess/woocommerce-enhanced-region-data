<?php
/**
 * Plugin Name: WooCommerce Enhanced Regions
 * Description: Populates missing region data for WooCommerce from individual country files in regions directory.
 * Version: 1.1.0
 * URL: https://github.com/ssthormess/woocommerce-enhanced-regions
 * Author: Simon Sthormes
 * Author URL: https://github.com/ssthormess
 * Text Domain: woocommerce-enhanced-regions
 * Domain Path: /languages
 */

namespace EnhancedRegions;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Require the main plugin class
require_once __DIR__ . '/src/Plugin.php';

// Initialize the plugin
$plugin = new Plugin(__FILE__);
$plugin->init();
