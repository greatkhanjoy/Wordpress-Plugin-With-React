<?php

namespace Greatkhanjoy\Complete;

/**
 * The frontend class
 */
class Frontend
{
    const prefix = 'greatkhanjoy-complete';

    /**
     * class constructor
     */
    function __construct()
    {
        new Frontend\Shortcode();

        add_action('wp_footer', array($this, 'render_frontend'));
    }

    /**
     * Render frontend
     *
     * @return void
     */
    public function render_frontend()
    {
        wp_enqueue_script(self::prefix . '-script');
        wp_enqueue_style(self::prefix . '-style');

        echo '<div id="' . self::prefix . '-render"></div>';
    }
}
