<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'inst_galleries',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('inst_id');
                $table->foreign('inst_id')->references('id')->on('institutions')
                    ->onDelete('cascade');
                $table->unsignedInteger('index')->default(0);
                $table->string('path');
                $table->text('desc')->nullable();
                $table->string('title')->nullable();
                $table->string('alt')->nullable();


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
        Schema::dropIfExists('inst_galleries');
    }
}
