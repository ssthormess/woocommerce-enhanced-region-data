<?php
/**
 * Plugin Name: Enhanced Region Data for WooCommerce
 * Description: Populates missing region data for WooCommerce from individual country files in regions directory.
 * Version: 1.0.0
 * URL: https://github.com/ssthormess/enhanced-regions
 * Author: Simon Sthormes
 * Author URL: https://github.com/ssthormess
 * License: GPLv2 or later
 * Text Domain: enhanced-region-data
 * Domain Path: /languages
 */

namespace EnhancedRegionData;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Require the main plugin class
require_once __DIR__ . '/src/Plugin.php';

// Initialize the plugin
$plugin = new Plugin(__FILE__);
$plugin->init();
