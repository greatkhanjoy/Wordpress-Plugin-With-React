<?php

namespace Greatkhanjoy\Complete\Admin;

/**
 * The Menu handler class
 */
class Menu
{
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
        $parent_slug = 'greatkhanjoy-complete';
        $capability = 'manage_options';

        add_menu_page(__('Greatkhanjoy Complete', 'greatkhanjoy-complete'), __('Greatkhanjoy Complete', 'greatkhanjoy-complete'), $capability, $parent_slug, [$this, 'plugin_page'], 'dashicons-admin-generic');

        add_submenu_page($parent_slug, __('General', 'greatkhanjoy-complete'), __('General', 'greatkhanjoy-complete'), $capability, $parent_slug, [$this, 'plugin_page']);

        add_submenu_page($parent_slug, __('Settings', 'greatkhanjoy-complete'), __('Settings', 'greatkhanjoy-complete'), $capability, 'greatkhanjoy-complete-settings', [$this, 'plugin_page_settings']);
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
