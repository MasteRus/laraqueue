<?php

class S_q_servicesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('s_q_services')->truncate();
/*
		$s_q_services = array(
                        'name'        => 'Moderator',
                        'permissions' => array(
                            'admin' => 1,
                            'users' => 1,
                        ),
		));
*/
		// Uncomment the below to run the seeder
		// DB::table('s_q_services')->insert($s_q_services);
	}

}
