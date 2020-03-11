<?php

class UsersSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//Create the type of emails		
		User::create(array('name' => 'Admin user','phone' => '','email' => 'adminera@hotmail.com','password' => 'adminadmin','street' => '','noext' => '','noint' => '','colony' => '','cp' => 0,'city' => '','state' => '','country' => '','hash' => '','emailActive' => true, 'admin' => true));		
	}

}