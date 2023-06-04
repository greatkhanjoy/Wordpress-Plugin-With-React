<?php

/**
 * Plugin Name: QuickStart - Greatkhanjoy
 * Plugin URI: https://greatkhanjoy.me
 * Description: This is a quickstart plugin for WordPress.
 * Version: 1.0.0
 * Author: Greatkhanjoy
 * Author URI: https://greatkhanjoy.me
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Main Plugin Class
 */

final class Greatkhanjoy_Complete
{
    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0.0';

    /**
     * class constructor
     */
    private function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);

        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /**
     * Initialize a singleton instance
     *
     * @return \Greatkhanjoy_Complete
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * Define necessary constants
     * @return void
     */
    public function define_constants()
    {
        define('GREATKHANJOY_COMPLETE_VERSION', self::version);
        define('GREATKHANJOY_COMPLETE_FILE', __FILE__);
        define('GREATKHANJOY_COMPLETE_PATH', __DIR__);
        define('GREATKHANJOY_COMPLETE_URL', plugins_url('', GREATKHANJOY_COMPLETE_FILE));
        define('GREATKHANJOY_COMPLETE_ASSETS', GREATKHANJOY_COMPLETE_URL . '/assets');
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin()
    {
        if (is_admin()) {
            new Greatkhanjoy\Complete\Admin();
        } else {
            new Greatkhanjoy\Complete\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate()
    {

        $installed = get_option('greatkhanjoy_complete_installed');

        if (!$installed) {
            update_option('greatkhanjoy_complete_installed', time());
        }
        update_option('greatkhanjoy_complete_version', GREATKHANJOY_COMPLETE_VERSION);
    }
}

/**
 * Initialize the plugin
 *
 * @return \Greatkhanjoy_Complete
 */
function greatkhanjoy_complete()
{
    return Greatkhanjoy_Complete::init();
}

// kick-off the plugin
greatkhanjoy_complete();