<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('payments', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->string('ID_');		    
		    $table->boolean('valid')->default(0);
		    $table->string('Status');
		    $table->string('Amount');
		    $table->string('Order');
		    $table->string('CODE');
		    $table->string('CardInfo');
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
		Schema::dropIfExists('payments');
	}
}
