<?php

class Operstatus_initialTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('operstatus')->truncate();
                /*
                    $table->index('user_id');
                    $table->index('session_id');
                    $table->index('operplace_id');
                    $table->string('status');
                 */
                
                $test=DB::select('Select id,\'disabled\' as status from s_q_operplaces');
                foreach ($test as $testobject)
                {
                    DB::insert('INSERT INTO `operstatus`(`operplace_id`, `status`) '
                        . 'VALUES (?,?)',array($testobject->id,$testobject->status));
                }


                
		// Uncomment the below to run the seeder
		// DB::table('operstatus_initial')->insert($operstatus_initial);
	}

}
