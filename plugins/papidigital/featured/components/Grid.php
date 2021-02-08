<?php namespace PapiDigital\Featured\Components;

use Lang;
use Redirect;
use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use October\Rain\Database\Model;
use October\Rain\Database\Collection;
use RainLab\Blog\Models\Post as BlogPost;
use RainLab\Blog\Models\Category as BlogCategory;
use RainLab\Blog\Models\Settings as BlogSettings;

class Grid extends ComponentBase
{

    public $featuredPost;
    public $recentPosts;
    public $posts;
    public $pageParam;
    public $category;
    public $postPage;

    public function componentDetails()
    {
        return [
            'name'        => 'Show featured blog posts.',
            'description' => 'Grid component to show featured blogs in specific order.'
        ];
    }

    public function defineProperties()
    {
        return [
            'postPage' => [
                'title'       => 'rainlab.blog::lang.settings.posts_post',
                'description' => 'rainlab.blog::lang.settings.posts_post_description',
                'type'        => 'dropdown',
                'default'     => 'blog/post',
                'group'       => 'rainlab.blog::lang.settings.group_links',
            ],
        ];
    }
    
    public function getPostPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function onRun()
    {
        $this->featuredPost = $this->getFeaturedPost();
        $this->recentPosts = $this->getRecentPosts();
    }

    public function getFeaturedPost()
    {   
        return BlogPost::where('featured', 1)->inRandomOrder()->limit(1)->get();
    }

    public function getRecentPosts()
    {   
        return BlogPost::where('featured', 0)->orderByDesc('created_at')->limit(2)->get();
    }
}
