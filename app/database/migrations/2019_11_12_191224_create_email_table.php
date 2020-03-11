<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('emails', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->bigInteger('userID');
		    $table->bigInteger('emailTypeId');
		    $table->boolean('send');
		    $table->string('errorCode')->nullable();
		    $table->string('errorDescription')->nullable();
		    $table->datetime('created_at');
		    $table->datetime('updated_at');		    
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExists('emails');
	}
}
