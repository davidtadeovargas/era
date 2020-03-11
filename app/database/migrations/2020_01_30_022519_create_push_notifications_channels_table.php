<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushNotificationsChannelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('channels', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->string('name',50);
		    $table->string('description',255);
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
		Schema::dropIfExists('channels');
	}
}
