<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('galleries',function($table){
      $table->increments('id');
      $table->string('name');
    });
    Schema::create('galleries_photos', function($table){
      $table->increments('id');
      $table->integer('gallery_id')->unsigned();
      $table->integer('photo_id')->unsigned();

      $table->foreign('gallery_id')->references('id')->on('galleries');
      $table->foreign('photo_id')->references('id')->on('photos');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::table('galleries_photos', function($table){
      $table->dropForeign('galleries_photos_gallery_id_foreign');
      $table->dropForeign('galleries_photos_photo_id_foreign');
    });
    Schema::drop('galleries_photos');
    Schema::drop('galleries');
	}

}
