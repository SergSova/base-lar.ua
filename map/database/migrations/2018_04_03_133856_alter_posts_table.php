<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'ALTER TABLE `posts` ADD FULLTEXT postsearch_ru(title_ru,content_ru)'
        );
        DB::statement(
            'ALTER TABLE `posts` ADD FULLTEXT postsearch_uk(title_uk,content_uk)'
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'posts',
            function (Blueprint $table) {
                $table->dropIndex('postsearch_ru');
                $table->dropIndex('postsearch_uk');
            }
        );
    }
}
