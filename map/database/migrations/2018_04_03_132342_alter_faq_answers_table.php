<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFaqAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement('ALTER TABLE `faq_answers` ADD FULLTEXT faqsearch_ru(question_ru, answer_ru)');
        DB::statement('ALTER TABLE `faq_answers` ADD FULLTEXT faqsearch_uk( question_uk,answer_uk)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'faq_answers',
            function (Blueprint $table) {
                $table->dropIndex('faqsearch_ru');
                $table->dropIndex('faqsearch_uk');
            }
        );
    }
}
