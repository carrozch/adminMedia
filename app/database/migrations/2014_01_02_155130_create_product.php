<?php

use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table) {
            $table->increments('id')->unsigned();
            $table->string('company_name', 128);
            $table->string('name', 128);
			$table->text('description');
			$table->string('price', 64);
			$table->string('currency', 64);
			$table->enum('status', array('free', 'blocked'))->default('free');			
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
		Schema::table('products', function($table) {
            $table->dropForeign('products_media_id_foreign');
        });
		Schema::drop('products');
	}

}