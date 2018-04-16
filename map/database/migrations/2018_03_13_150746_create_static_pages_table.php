<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create(
			'static_pages',
			function ( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'title_ru' );
				$table->text( 'longtitle_ru' )->nullable();
				$table->text( 'description_ru' )->nullable();
				$table->string( 'title_uk' )->nullable();
				$table->text( 'longtitle_uk' )->nullable();
				$table->text( 'description_uk' )->nullable();
				$table->unsignedInteger( 'page_index' )->default( 0 );
				$table->string( 'menutitle' )->nullable();
				$table->boolean( 'published' )->default( TRUE );
				$table->string( 'alias' )->unique();

				$table->unsignedInteger( 'seo_id_ru' )->nullable();
				$table->foreign( 'seo_id_ru' )->references( 'id' )->on( 'seos' )
				      ->onDelete( 'set null' );
				$table->unsignedInteger( 'seo_id_uk' )->nullable();
				$table->foreign( 'seo_id_uk' )->references( 'id' )->on( 'seos' )
				      ->onDelete( 'set null' );
				$table->timestamps();
			}
		);


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'static_pages' );
	}
}
