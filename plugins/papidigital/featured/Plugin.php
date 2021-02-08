<?php namespace PapiDigital\Featured;

use Backend;
use RainLab\Blog\Models\Post;
use System\Classes\PluginBase;
use Event;

/**
 * Featured Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Featured Blog Posts',
            'description' => 'This plugins include components to show featured blog posts',
            'author'      => 'PapiDigital, Joaz Rivera',
            'icon'        => 'icon-leaf',
            'website'     => 'https://www.papidigital.com/'
        ];
    }


    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        // Extend all backend form usage
        Event::listen('backend.form.extendFields', function($widget) {

            // Only for the Blog controller
            if (!$widget->getController() instanceof \RainLab\Blog\Controllers\Posts) {
                return;
            }

            // Only for the User model
            if (!$widget->model instanceof \RainLab\Blog\Models\Post) {
                return;
            }

            // Add an extra birthday field
            $widget->addFields([
                'featured' => [
                    'label'   => 'Featured',
                    'comment' => 'Select if you want to feature this blog post.',
                    'type'    => 'checkbox'
                ]
            ]);
        });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'PapiDigital\Featured\Components\Grid' => 'showFeaturedPosts',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'papidigital.featured.some_permission' => [
                'tab' => 'Featured',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'featured' => [
                'label'       => 'Featured',
                'url'         => Backend::url('papidigital/featured/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['papidigital.featured.*'],
                'order'       => 500,
            ],
        ];
    }
}
