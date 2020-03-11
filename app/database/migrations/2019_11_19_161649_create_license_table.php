<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('licenses', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->integer('computerID')->unsigned();
		    $table->integer('seriesXUserID')->unsigned();
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
		Schema::dropIfExists('licenses');
	}
}
