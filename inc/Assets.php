<?php

namespace Greatkhanjoy\Complete;

/**
 * The assets handler class
 */
class Assets
{
    const prefix = 'greatkhanjoy-complete';

    /**
     * class constructor
     */
    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'frontend_assets']);
        add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
    }

    public function frontend_assets()
    {
        wp_enqueue_script(self::prefix . '-script', GREATKHANJOY_COMPLETE_ASSETS . '/frontend.js', false, filemtime(GREATKHANJOY_COMPLETE_PATH . '/assets/frontend.js'), true);
    }

    public function admin_assets()
    {
        wp_enqueue_script(self::prefix . '-admin-script', GREATKHANJOY_COMPLETE_ASSETS . '/index.js', false, filemtime(GREATKHANJOY_COMPLETE_PATH . '/assets/index.js'), true);
        wp_enqueue_style(self::prefix . '-admin-style', GREATKHANJOY_COMPLETE_ASSETS . '/index.css', false, filemtime(GREATKHANJOY_COMPLETE_PATH . '/assets/index.css'));
    }
}
