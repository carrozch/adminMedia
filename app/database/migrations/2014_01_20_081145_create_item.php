<?php

use Illuminate\Database\Migrations\Migration;

class CreateItem extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table) {
            $table->increments('id')->unsigned(); 
			$table->integer('product_id')->unsigned();// This id is the same than the corresponding product in brands
			$table->enum('status_media', array('free', 'blocked'))->default('free');			
            $table->integer('media_id')->unsigned()->nullable();
            $table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('items', function($table) {
            $table->dropForeign('items_media_id_foreign');
        });
		Schema::drop('items');
	}

}