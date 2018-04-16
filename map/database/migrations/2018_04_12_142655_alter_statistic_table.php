<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'statistics',
            function (Blueprint $table) {
                $table->dropColumn('sex');
                $table->dropColumn('age');
                $table->dropColumn('answer');
                for ($i = 1; $i <= 12; $i++) {
                    $table->text('q'.$i, 255);
                }
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
        Schema::table(
            'statistics',
            function (Blueprint $table) {
                for ($i = 1; $i <= 12; $i++) {
                    $table->dropColumn('q'.$i);
                }
                $table->string('sex', 255);
                $table->string('age');
                $table->text('answer');
            }
        );
    }
}
