<?php

class EmailTypeSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//Create the type of emails		
		EmailType::create(array('name' => 'REGISTRO'));
		EmailType::create(array('name' => 'COMPRA DE LICENCIA'));
		EmailType::create(array('name' => 'CAMBIO DE CONTRASEÑA'));
		EmailType::create(array('name' => 'PRUEBA DE CORREO'));
	}

}
