<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushNotificationsAutomatedSendLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('push_notifications_automated_send_log', function($table)
		{
		    $table->increments('id')->unsigned();
		    $table->bigInteger('channel_id');
		    $table->boolean('everyday');
		    $table->time('everyDayAt')->default('13:00:00');
		    $table->boolean('send')->default(0);
		    $table->string('from',30);
		    $table->string('to',30);
		    $table->string('bannerAction',255);
		    $table->string('bannerFile',255);
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
		Schema::dropIfExists('push_notifications_automated_send_log');
	}

}
