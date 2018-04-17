<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'institution_sub_categories',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->unsignedInteger('parent_id');


                $table->foreign('parent_id')->references('id')->on('institution_categories')
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
        Schema::dropIfExists('institution_sub_categories');
    }
}
