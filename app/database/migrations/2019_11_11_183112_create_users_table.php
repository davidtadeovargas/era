<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->string('name',50);
		    $table->string('phone',20);
		    $table->string('email',70);
		    $table->string('password',20);
		    $table->string('street',50)->nullable();
		    $table->string('noext',10)->nullable();
		    $table->string('noint',10)->nullable();
		    $table->string('colony',50)->nullable();
		    $table->integer('cp')->nullable();
		    $table->string('city',20)->nullable();
		    $table->string('state',20)->nullable();
		    $table->string('country',20)->nullable();
		    $table->string('hash');
		    $table->string('pwdhash')->nullable();
		    $table->boolean('emailActive')->default(false);
		    $table->boolean('admin')->default(false);
		    $table->datetime('created_at');
		    $table->datetime('updated_at');
		    
		    $table->unique('email');
		    $table->unique('hash');
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
		Schema::dropIfExists('users');
	}

}
