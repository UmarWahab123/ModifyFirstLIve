<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('blog_title');
            $table->string('blog_slug');
            $table->string('blog_image');
            $table->string('blog_short_description');
            $table->string('blog_details');
            $table->integer('blog_category_id');
            $table->string('blog_meta_title')->nullable();
            $table->string('blog_meta_description')->nullable();
            $table->enum('status',['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
