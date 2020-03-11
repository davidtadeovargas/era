<?php

class ChannelsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//Create the type of emails		
		Channel::create(array(	'name' => 'PREMIUM',
								'description' => 'Usuarios que son premium'));
		Channel::create(array(	'name' => 'NO PREMIUM',
								'description' => 'Usuarios que no son licencia premium'));
	}

}