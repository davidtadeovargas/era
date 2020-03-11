<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('companies', function($table)
		{
		    $table->increments('id')->unsigned();		    
		    $table->integer('userID')->unsigned();
		    $table->string('companyName',150);
		    $table->string('companyCode',30);
		    $table->string('companyDB',100);
		    $table->string('costMethod',5);
		    $table->string('extension',10);
		    $table->string('fiscalRegimen',50);
		    $table->string('template',255);
		    $table->string('phone',30);		    
		    $table->string('phoneDeliver',30);
		    $table->string('expedPlace',40);
		    $table->string('personalPhone1',30);
		    $table->string('personalPhone2',30);
		    $table->string('street',100);
		    $table->string('celen',20);
		    $table->string('certificatePassword',255);
		    $table->string('streetDeliver',100);
		    $table->string('colony',50);
		    $table->string('colonyDeliver',50);
		    $table->string('ladaDeliver',10);
		    $table->integer('cp');
		    $table->integer('cpDeliver');
		    $table->string('city',50);
		    $table->string('cityDeliver',50);
		    $table->string('estate',50);
		    $table->string('contactDeliver3',50);
		    $table->string('contactDeliver2',50);
		    $table->string('contactDeliver1',50);
		    $table->string('estateDeliver',50);
		    $table->string('country',50);
		    $table->string('countryDeliver',50);
		    $table->string('rfc',20);
		    $table->string('email',70);
		    $table->string('website',255);		    
		    $table->string('interiorNumber',20);
		    $table->string('interiorNumberDeliver',20);
		    $table->string('externalNumber',20);
		    $table->string('pathCert',255);
		    $table->string('externalNumberDeliver',20);
		    $table->string('pathCertKey',255);
		    $table->string('moralOrPhisic',5);
		    $table->string('estation',30);
		    $table->string('appPath',255);
		    $table->string('sucursal',30);
		    $table->string('cashNumber',30);
		    $table->boolean('test')->default(false);
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
		Schema::dropIfExists('companies');		
	}
}
