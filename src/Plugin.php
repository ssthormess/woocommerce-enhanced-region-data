<?php

namespace EnhancedRegions;

if (!defined('ABSPATH')) {
    exit;
}

class Plugin {
    public const TEXT_DOMAIN = 'enhanced-regions';
    private string $plugin_file;
    private string $regions_dir;

    public function __construct(string $plugin_file) {
        $this->plugin_file = $plugin_file;
        $this->regions_dir = plugin_dir_path($plugin_file) . 'regions/';
    }

    public function init(): void {
        add_action('plugins_loaded', [$this, 'load_textdomain']);
        add_action('plugins_loaded', [$this, 'register_hooks']);
    }

    public function load_textdomain(): void {
        load_plugin_textdomain(
            self::TEXT_DOMAIN,
            false,
            dirname(plugin_basename($this->plugin_file)) . '/languages'
        );
    }

    public function register_hooks(): void {
        if ($this->is_woocommerce_active()) {
            add_filter('woocommerce_states', [$this, 'add_regions'], 100);
        }
    }

    private function is_woocommerce_active(): bool {
        return class_exists('WooCommerce');
    }

    public function add_regions(array $states): array {
        if (!is_dir($this->regions_dir)) {
            return $states;
        }

        $files = glob($this->regions_dir . '*.php');

        if ($files) {
            foreach ($files as $file) {
                if (!is_readable($file)) {
                    continue;
                }

                $country_code = basename($file, '.php');

                // Only add if WooCommerce doesn't have data for this country
                // This preserves existing WC data and prevents conflicts
                if (empty($states[$country_code])) {
                    $country_states = include $file;
                    if (is_array($country_states)) {
                        $states[$country_code] = $country_states;
                    }
                }
            }
        }

        return $states;
    }
}
