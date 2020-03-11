<?php

class UserHistoryTypeSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//Create the type of emails		
		UserHistoryType::create(array('description' => 'PRIMERA INSTALACIÓN'));
		UserHistoryType::create(array('description' => 'PRIMERA COMPRA DE LICENCIAMIENTO'));		
		UserHistoryType::create(array('description' => 'ACTIVACIÓN DE LICENCIA EN EQUIPO'));
		UserHistoryType::create(array('description' => 'REVOCACIÓN DE LICENCIA EN EQUIPO'));
		UserHistoryType::create(array('description' => 'COMPRA DE PRODUCTO'));
		UserHistoryType::create(array('description' => 'LOGIN'));
		UserHistoryType::create(array('description' => 'COMPRA DE TIMBRES'));
		UserHistoryType::create(array('description' => 'COMPRA DE LICENCIA'));
		UserHistoryType::create(array('description' => 'REGISTRO DE USUARIO'));
		UserHistoryType::create(array('description' => 'CIERRE DE SESION DE USUARIO'));
	}

}