<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('computers', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->integer('userID')->unsigned();
		    $table->string('name',25);
		    $table->string('computerIDD',100);		    
		    $table->datetime('created_at');
		    $table->datetime('updated_at');

		    $table->foreign('userID')->references('id')->on('users');
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
		Schema::dropIfExists('computers');
	}
}
