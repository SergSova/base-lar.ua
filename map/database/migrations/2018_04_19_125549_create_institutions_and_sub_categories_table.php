<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsAndSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'institutions_and_sub_categories',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('institution_id');
                $table->unsignedInteger('institution_sub_cat_id');

                $table->foreign('institution_id')->references('id')->on('institutions')
                    ->onDelete('cascade');
                $table->foreign('institution_sub_cat_id')->references('id')->on('institution_sub_categories')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('institutions_and_sub_categories');
    }
}
