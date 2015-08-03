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

		// $this->call('UserTableSeeder');
		//$this->call('S_q_orgsTableSeeder');
		//$this->call('S_q_deptsTableSeeder');
                $this->call('SentrySeeder');
		$this->call('S_q_servicesTableSeeder');
		$this->call('S_q_operplacesTableSeeder');
		$this->call('Operstatus_initialTableSeeder');
	}

}
