<?php

class ProductTypeSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//Create the type of emails		
		ProductType::create(array('description' => 'LICENCIA'));
		ProductType::create(array('description' => 'TIMBRES'));
		ProductType::create(array('description' => 'REVOCACIÓN'));		
	}
}