<?php

namespace Greatkhanjoy\Complete\Frontend;

/**
 * The Shortcode handler class
 */

class Shortcode
{

    /**
     * Intialize the class
     */
    function __construct()
    {
        add_shortcode('greatkhanjoy-complete', [$this, 'render_shortcode']);
    }

    /**
     * Render shortcode
     *
     * @param array $atts
     * @param string $content
     * 
     * @return string
     */
    public function render_shortcode($atts, $content = '')
    {
        return 'Hello from shortcode';
    }
}
