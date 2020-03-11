<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesXUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('series_x_users', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->integer('userID')->unsigned();
		    $table->integer('paymentID')->unsigned();
		    $table->string('serie',100);
		    $table->integer('numberComputers');
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
		Schema::dropIfExists('series_x_users');
	}
}
