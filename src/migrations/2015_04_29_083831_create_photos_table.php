<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('description')->nullable();
			$table->string('path');
			$table->timestamps();
    });

    Schema::create('galleries_photos', function($table){
      $table->increments('id');
      $table->integer('gallery_id')->unsigned();
      $table->integer('photo_id')->unsigned();
      $table->integer('prio')->default(0);

      $table->foreign('gallery_id')->references('id')->on('galleries')->on_delete('cascade');
      $table->foreign('photo_id')->references('id')->on('photos')->on_delete('cascade');
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
		Schema::drop('photos');
	}

}
