<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_history', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
		    $table->integer('user_history_type_id')->unsigned()->nullable();
		    $table->integer('user_id')->unsigned()->nullable();
		    $table->integer('payment_id')->unsigned()->nullable();
		    $table->integer('computer_id')->unsigned()->nullable();
		    $table->integer('product_id')->unsigned()->nullable();
		    $table->string('serie',255)->nullable();
		    $table->datetime('created_at');
		    $table->datetime('updated_at');

		    //$table->foreign('user_history_type_id')->references('id')->on('users_history_type');
		    //$table->foreign('user_id')->references('id')->on('users');
		    //$table->foreign('payment_id')->references('id')->on('payments');
		    //$table->foreign('computer_id')->references('id')->on('computers');
		    //$table->foreign('product_id')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users_history');
	}

}
