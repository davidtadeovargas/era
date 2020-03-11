<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('EmailTypeSeeder');
		$this->command->info('EmailTypeSeeder table seeded!');
		$this->call('ProductsSeeder');
		$this->command->info('ProductsSeeder table seeded!');
		$this->call('UsersSeeder');
		$this->command->info('UsersSeeder table seeded!');
		$this->call('ChannelsSeeder');
		$this->command->info('ChannelsSeeder table seeded!');
		$this->call('UserHistoryTypeSeeder');
		$this->command->info('UserHistoryTypeSeeder table seeded!');
		$this->call('ProductTypeSeeder');
		$this->command->info('ProductTypeSeeder table seeded!');
	}

}
