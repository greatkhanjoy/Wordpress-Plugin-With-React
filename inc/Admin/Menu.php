<?php

namespace Greatkhanjoy\Complete\Admin;

/**
 * The Menu handler class
 */
class Menu
{
    const slug = 'greatkhanjoy-complete'; // slug and text domain
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

        add_menu_page(__('Greatkhanjoy Complete', self::slug), __('Greatkhanjoy Complete', self::slug), $capability, self::slug, [$this, 'plugin_page'], 'dashicons-admin-generic');

        add_submenu_page(self::slug, __('General', self::slug), __('General', self::slug), $capability, self::slug, [$this, 'plugin_page']);

        add_submenu_page(self::slug, __('Settings', self::slug), __('Settings', self::slug), $capability, 'greatkhanjoy-complete-settings', [$this, 'plugin_page_settings']);
    }

    /**
     * Plugin page
     *
     * @return void
     */
    public function plugin_page()
    {
        echo 'Hello World';
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
