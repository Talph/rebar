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
        Schema::create('blog_posts', static function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title')->nullable()->default('New Blog Post');
            $table->string('subtitle')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('short_description')->nullable();
            $table->mediumText('post_body')->nullable();
            $table->string('seo_title')->nullable();
            $table->dateTime('posted_at')->index()->nullable()->comment('Posted time, if this is in future then blog will not appear yet');
            $table->boolean('is_published')->default(false);
            $table->string('image_large')->nullable();
            $table->string('image_medium')->nullable();
            $table->string('image_thumbnail')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_categories', static function(Blueprint $table){
            $table->increments('id');
            $table->string('category_name')->nullable();
            $table->string('category_description')->nullable();
            $table->string('slug')->unique();
            $table->unsignedInteger('created_by')->nullable()->index()->comment('user id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_posts_blog_categories', static function(Blueprint $table){
            $table->unsignedInteger('blog_post_id')->index();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('blog_category_id')->index();
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('blog_comments', static function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('blog_post_id')->index();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('user_id')->nullable()->index()->comment('If user was logged in');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ip')->nullable()->comment('if enabled in the config file');
            $table->string('author_name')->nullable()->comment('If user was not logged in');
            $table->string('author_email')->nullable();
            $table->string('author_website')->nullable();
            $table->text('blog_comment');
            $table->boolean('approved')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_uploaded_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->index()->comment('If user was logged in');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('uploaded_images')->nullable();
            $table->string('image_title')->nullable();
            $table->string('source')->default('unknown');
            $table->unsignedInteger('uploader_id')->nullable()->index();
            $table->foreign('uploader_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('blog_uploaded_images');
        Schema::dropIfExists('blog_comments');
        Schema::dropIfExists('blog_posts_blog_categories');
        Schema::dropIfExists('blog_categories');
        Schema::dropIfExists('blog_posts');
    }
}
