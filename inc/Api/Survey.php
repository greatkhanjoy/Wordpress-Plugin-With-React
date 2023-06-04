<?php

namespace Greatkhanjoy\Complete\Api;

use WP_REST_Controller;

/**
 * The Survey class
 */

class Survey extends WP_REST_Controller
{
    const prefix = 'greatkhanjoy-complete';

    function __construct()
    {
        $this->namespace = self::prefix . '/v1';
        $this->rest_base = 'surveys';
    }

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes()
    {

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                [
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'get_items'],
                    'permission_callback' => [$this, 'get_items_permissions_check'],
                    'args' => $this->get_collection_params()
                ],
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'create_item'],
                    'permission_callback' => [$this, 'create_item_permissions_check'],
                    'args' => $this->get_endpoint_args_for_item_schema(\WP_REST_Server::CREATABLE)
                ]
            ],
        );
    }

    /**
     * Check permissions for the read
     *
     * @param \WP_REST_Request $request
     * @return boolean
     */
    public function get_items_permissions_check($request)
    {
        if (current_user_can('manage_options')) {
            return true;
        }

        return false;
    }

    /**
     * Check permissions for the create
     *
     * @param \WP_REST_Request $request
     * @return boolean
     */
    public function create_item_permissions_check($request)
    {
        if (current_user_can('manage_options')) {
            return true;
        }

        return false;
    }

    /**
     * Get a collection of items
     *
     * @param \WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function get_items($request)
    {
        return rest_ensure_response(
            [
                [
                    'id' => 1,
                    'name' => 'Survey 1',
                    'description' => 'This is survey 1'
                ],
                [
                    'id' => 2,
                    'name' => 'Survey 2',
                    'description' => 'This is survey 2'
                ],
                [
                    'id' => 3,
                    'name' => 'Survey 3',
                    'description' => 'This is survey 3'
                ]
            ]
        );
    }
}
