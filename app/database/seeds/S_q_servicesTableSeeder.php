<?php

class S_q_servicesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('s_q_services')->delete();
                $s_q_services=array(
                    array(
                        'name' => 'Tree 1',
                        'description'=> 'Tree 1',
                        'priority'=> 1,
                        //'parent_id'=> '',
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Tree 2',
                        'description'=> 'Tree 2',
                        'priority'=> 1,
                        //'parent_id'=> '',
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Tree 3',
                        'description'=> 'Tree 3',
                        'priority'=> 1,
                        //'parent_id'=> '',
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));
                $s_q_services2=array(
                    array(
                        'name' => 'Tree 1-1',
                        'description'=> 'Tree 1-1',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Tree 1-2',
                        'description'=> 'Tree 1-2',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));
                $s_q_services3=array(
                    array(
                        'name' => 'Tree 1-1-1',
                        'description'=> 'Tree 1-1-1',
                        'priority'=> 1,
                        'parent_id'=> 4,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),       
                    
                    array(
                        'name' => 'Tree 1-1-2',
                        'description'=> 'Tree 1-1-1',
                        'priority'=> 1,
                        'parent_id'=> 4,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )   
                );

		// Uncomment the below to run the seeder
		DB::table('s_q_services')->insert($s_q_services);
                DB::table('s_q_services')->insert($s_q_services2);
                DB::table('s_q_services')->insert($s_q_services3);
	}

}
