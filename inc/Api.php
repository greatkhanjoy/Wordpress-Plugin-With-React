<?php

namespace Greatkhanjoy\Complete;

/**
 * The Api class
 */

class Api
{

    const prefix = 'greatkhanjoy-complete';

    /**
     * class constructor
     */
    function __construct()
    {
        add_action('rest_api_init', [$this, 'register_api']);
    }

    /**
     * Register the api
     *
     * @return void
     */
    public function register_api()
    {
        $survey =  new Api\Survey();
        $survey->register_routes();
    }
}
