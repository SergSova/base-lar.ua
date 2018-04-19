<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'institutions',
            function (Blueprint $table) {
                $table->increments('id');

                $table->string('name');

                $table->unsignedInteger('district_id')->nullable();
                $table->foreign('district_id')->references('id')->on('districts')
                    ->onDelete('set null');

                $table->string('address');

                $table->unsignedInteger('metro_id')->nullable();
                $table->foreign('metro_id')->references('id')->on('metros')
                    ->onDelete('set null');

                $table->string('avg_cost')->nullable();
                $table->string('cuisine')->nullable();
                $table->text('phones')->nullable();
                $table->string('email')->nullable();
                $table->string('web')->nullable();
                $table->text('socials')->nullable();
                $table->text('content')->nullable();

                $table->unsignedInteger('category_id')->nullable();
                $table->foreign('category_id')->references('id')->on('institution_categories')
                    ->onDelete('set null');

                $table->boolean('isCounsel')->default(false);

                $table->boolean('isEveryDay')->default(false);
                $table->text('schedule')->nullable();

                $table->enum('status', ['disable', 'active'])->default('disable');
                $table->enum('request', ['request', 'rejected', 'approved'])->default('request');

                $table->unsignedInteger('author_id');
                $table->foreign('author_id')->references('id')->on('users')
                    ->onDelete('cascade');

                $table->timestamp('date_request')->nullable();
                $table->timestamp('date_approved')->nullable();

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
        Schema::dropIfExists('institutions');
    }
}
