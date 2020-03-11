<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTableForeignsKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('licenses', function($table)
		{
		    $table->foreign('computerID')->references('id')->on('computers');
		    $table->foreign('seriesXUserID')->references('id')->on('series_x_users');		    
		});

		//
		Schema::table('series_x_users', function($table)
		{
		    $table->foreign('userID')->references('id')->on('users');
		});

		//
		Schema::table('payments', function($table)
		{
		    //$table->foreign('id')->references('paymentID')->on('series_x_users');
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
	}

}
