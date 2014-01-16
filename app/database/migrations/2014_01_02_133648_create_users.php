<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medias', function($table) {
            $table->increments('id')->unsigned();
            $table->string('name', 128);
            $table->text('intro_text');
            $table->text('full_text');
			$table->timestamps();
        });
		
		Schema::create('users', function($table) {
            $table->increments('id')->unsigned();
            $table->string('username', 64)->unique();
            $table->string('password', 64);
            $table->string('email', 64)->unique();
			$table->integer('media_id')->unsigned()->nullable();
            $table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', array('user', 'admin'))->default('user');
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
		Schema::table('users', function($table) {
            $table->dropForeign('users_media_id_foreign');
        });
		Schema::drop('medias');
		Schema::drop('users');		
	}

}