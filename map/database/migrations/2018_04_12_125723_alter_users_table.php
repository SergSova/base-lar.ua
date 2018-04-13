<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->string('password')->nullable()->change();

                $table->string('avatar')->default(asset('images/avtars/IDR_PROFILE_AVATAR_13@1x.png'));
                $table->string('provider');
                $table->string('provider_id');
                $table->string('access_token')->nullable();
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
            'users',
            function (Blueprint $table) {
                $table->string('password')->change();

                $table->dropColumn('avatar');
                $table->dropColumn('provider');
                $table->dropColumn('provider_id');
                $table->dropColumn('access_token');
            }
        );

    }
}
