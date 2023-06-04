<?php

namespace Greatkhanjoy\Complete\Admin;

/**
 * The Menu handler class
 */
class Menu
{
    const slug = 'greatkhanjoy-complete'; // prefix,slug and text domain
    /**
     * class constructor
     */
    function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu()
    {
        $capability = 'manage_options';

        $hook = add_menu_page(__('Greatkhanjoy Complete', self::slug), __('Greatkhanjoy Complete', self::slug), $capability, self::slug, [$this, 'plugin_page'], 'dashicons-admin-generic');

        add_submenu_page(self::slug, __('General', self::slug), __('General', self::slug), $capability, self::slug, [$this, 'plugin_page']);

        add_submenu_page(self::slug, __('Settings', self::slug), __('Settings', self::slug), $capability, 'greatkhanjoy-complete-settings', [$this, 'plugin_page_settings']);

        add_action('admin_head-' . $hook, [$this, 'enqueue_assets']);
    }

    /**
     * Enqueue admin assets
     *
     * @return void
     */
    public function enqueue_assets()
    {
        wp_enqueue_script(self::slug . '-admin-script');
        wp_enqueue_style(self::slug . '-admin-style');

        wp_localize_script(self::slug . '-admin-script', self::slug, array(
            'api_url' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest')
        ));
    }

    /**
     * Plugin page
     *
     * @return void
     */
    public function plugin_page()
    {
        echo '<h2 class="plugin-heading">Plugin page</h2>';
    }

    /**
     * Plugin page settings
     *
     * @return void
     */
    public function plugin_page_settings()
    {
        echo 'Setttings page';
    }
}
