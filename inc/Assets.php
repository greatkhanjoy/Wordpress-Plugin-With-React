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
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function get_scripts()
    {
        return [
            self::prefix . '-script' => [
                'src' => GREATKHANJOY_COMPLETE_ASSETS . '/frontend.js',
                'version' => filemtime(GREATKHANJOY_COMPLETE_PATH . '/assets/frontend.js'),
                'footer' => true
            ],
            self::prefix . '-admin-script' => [
                'src' => GREATKHANJOY_COMPLETE_ASSETS . '/index.js',
                'version' => filemtime(GREATKHANJOY_COMPLETE_PATH . '/assets/index.js'),
                'footer' => true
            ]
        ];
    }

    public function get_styles()
    {
        return [
            self::prefix . '-style' => [
                'src' => GREATKHANJOY_COMPLETE_ASSETS . '/frontend.css',
                'version' => filemtime(GREATKHANJOY_COMPLETE_PATH . '/assets/frontend.css'),
                'footer' => false
            ],
            self::prefix . '-admin-style' => [
                'src' => GREATKHANJOY_COMPLETE_ASSETS . '/index.css',
                'version' => filemtime(GREATKHANJOY_COMPLETE_PATH . '/assets/index.css'),
                'footer' => false
            ]
        ];
    }

    public function enqueue_assets()
    {
        $scripts = $this->get_scripts();
        $styles = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;
            wp_register_script($handle, $script['src'], $deps, $script['version'], $script['footer']);
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;
            wp_register_style($handle, $style['src'], $deps, $style['version'], $style['footer']);
        }
    }
}
