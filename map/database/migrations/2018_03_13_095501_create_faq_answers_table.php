<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateFaqAnswersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create(
                'faq_answers',
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('question_ru');
                    $table->string('question_uk')->nullable();
                    $table->text('answer_ru');
                    $table->text('answer_uk')->nullable();
                    $table->unsignedInteger('index');

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
            Schema::dropIfExists('faq_answers');
        }
    }
