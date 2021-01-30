<?php namespace PapiDigital\Featured\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class PostsAddFeatured extends Migration
{

    public function up()
    {
        if (Schema::hasColumn('rainlab_blog_posts', 'featured')) {
            return;
        }

        Schema::table('rainlab_blog_posts', function($table)
        {
            $table->boolean('featured')->default(0);
        });
    }

    public function down()
    {
        if (Schema::hasColumn('rainlab_blog_posts', 'featured')) {
            Schema::table('rainlab_blog_posts', function ($table) {
                $table->dropColumn('featured');
            });
        }
    }

}
