<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'posts',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('title_ru');
                $table->string('title_uk')->nullable();
                $table->text('description_ru')->nullable();
                $table->text('description_uk')->nullable();
                $table->text('content_ru')->nullable();
                $table->text('content_uk')->nullable();
                $table->unsignedInteger('seo_id_ru')->nullable();
                $table->foreign('seo_id_ru')->references('id')->on('seos')
                    ->onDelete('set null');
                $table->unsignedInteger('seo_id_uk')->nullable();
                $table->foreign('seo_id_uk')->references('id')->on('seos')
                    ->onDelete('set null');

                $table->boolean('published')->default(1);
                $table->dateTime('publishedOn')->nullable();
                $table->string('mainImage')->nullable();
                $table->string('mainVideo')->nullable();
                $table->boolean('isBlackTitle')->default(0);
                $table->boolean('isVioletPostStyle')->default(0);
                $table->boolean('isBig')->default(0);
                $table->boolean('isVideo')->default(0);
                //slider - это JSON объект (path, alt, title)
                $table->text('slider')->nullable();
                $table->unsignedInteger('viewers')->default(0);
                $table->unsignedInteger('followers')->default(0);
                $table->string('author')->nullable();
                $table->string('authorImage')->nullable();
                $table->unsignedInteger('index')->default(0);
                $table->string('slug');

                $table->unsignedInteger('category_id')->nullable();
                $table->foreign('category_id')->references('id')->on('blog_categories')
                    ->onDelete('cascade');


                $table->softDeletes();
                $table->timestamps();
            }
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
