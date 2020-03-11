<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('products', function($table)
		{
		    $table->increments('id')->unsigned();		    
		    $table->string('code',10);
		    $table->bigInteger('productTypeID');
		    $table->string('description',255);
		    $table->double('price');
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
		Schema::dropIfExists('products');		
	}
}
