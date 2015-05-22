<?php

class S_q_operplacesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('s_q_operplaces')->truncate();

                DB::table('s_q_operplaces')->delete();
                $s_q_operplaces=array(
                    array(
                        'name' => 'GIC 1',
                    ),
                    array(
                        'name' => 'GIC 2',
                    ),
                    array(
                        'name' => 'KSK 3',
                    ),
                    array(
                        'name' => 'KSK 4',
                    ),
                    
                    array(
                        'name' => 'UAIG 5',
                    ),
                    array(
                        'name' => 'UAIG 6',
                    ),                    
                    array(
                        'name' => 'UAIG 7',
                    ),
                    array(
                        'name' => 'UAIG 8',
                    ),                    
                    array(
                        'name' => 'UAIG 9',
                    ),
                    array(
                        'name' => 'CENTR GZ 10',
                    ),
                    array(
                        'name' => 'CENTR GZ 11',
                    ),
                    array(
                        'name' => 'CENTR GZ 12',
                    )                    
                    
                    );
		// Uncomment the below to run the seeder
		DB::table('s_q_operplaces')->insert($s_q_operplaces);
	}

}
