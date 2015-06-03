<?php

class SentrySeeder extends Seeder {

    public function run()
    {
        /*
        DB::table('groups')->delete();
        try
        {
                // Create the group
            $group = Sentry::createGroup(array(
                'name'        => 'Moderator',
                'permissions' => array(
                    'admin' => 1,
                    'users' => 1,
                ),
            ));
        }
        catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {
                    echo 'Name field is required';
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            echo 'Group already exists';

        }
         *
         */
        //DB::table('users_groups')->truncate();
        //DB::table('users')->delete();
        //DB::table('groups')->delete();
        //DB::table('users')->truncate();
        //DB::table('groups')->truncate();
        Sentry::getGroupProvider()->findByName('KSK')->delete();
        Sentry::getGroupProvider()->findByName('UAIG 108')->delete();
        //$json_rights=json_decode('{"superuser":0,"1":0,"2":0,"3":0,"4":0,"5":0,"6":0,"7":0,"8":0,"9":0,"10":0,"11":0,"12":0,"13":0,"14":0,"15":0,"16":0,"17":0,"18":0,"19":0,"20":0,"21":0,"22":0,"23":0,"24":0,"25":0,"26":0,"27":0,"28":0,"29":0,"30":0,"31":0,"32":0,"33":0,"34":0,"35":0,"36":0,"37":0,"38":0,"39":0,"40":0,"41":0,"42":0,"43":0,"44":0,"45":0,"46":0,"47":0,"48":0,"49":0,"50":0,"51":0,"52":0,"53":0,"54":0,"55":0,"56":0,"57":0}', true);
        $ksk_rights=array('superuser'=>0,
                '1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'17'=>0,'18'=>0,'19'=>0,'20'=>0,'21'=>0,'22'=>0,'23'=>0,
                '24'=>1,
                '25'=>0,'26'=>0,'27'=>0,'28'=>0,'29'=>0,
                '30'=>0,'31'=>0,'32'=>0,'33'=>0,'34'=>0,'35'=>0,'36'=>0,
                '37'=>1,'38'=>1,
                '39'=>1,'40'=>1,
                '41'=>1,'42'=>1,
                '43'=>1,'44'=>1
                );
        $gr1=Sentry::getGroupProvider()->create(array(
            'name'        => 'KSK',
            'permissions' => array('superuser'=>1, 'test'=>0,'test2'=>1,'3'=>1,'4'=>1,'5'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'17'=>0,'18'=>0,'19'=>0,'20'=>0,'21'=>0,'22'=>0,'23'=>0
                

                
                ),
            )
        );
        $gr1->permissions=$ksk_rights;
        $gr1->save();
        //Sentry::getGroupProvider()->findByName('UAIG 108')->delete();
        //$json_rights=json_decode('{"superuser":0,"1":0,"2":0,"3":0,"4":0,"5":0,"6":0,"7":0,"8":0,"9":0,"10":0,"11":0,"12":0,"13":0,"14":0,"15":0,"16":0,"17":0,"18":0,"19":0,"20":0,"21":0,"22":0,"23":0,"24":0,"25":0,"26":0,"27":0,"28":0,"29":0,"30":0,"31":0,"32":0,"33":0,"34":0,"35":0,"36":0,"37":0,"38":0,"39":0,"40":0,"41":0,"42":0,"43":0,"44":0,"45":0,"46":0,"47":0,"48":0,"49":0,"50":0,"51":0,"52":0,"53":0,"54":0,"55":0,"56":0,"57":0}', true);
        $uaig108_rights=json_decode('{"superuser":0}', true);//array
        Sentry::getGroupProvider()->create(array(
            'name'        => 'UAIG 108',
            'permissions' => array('superuser'=>0,
                '24'=>1,
                '37'=>1,'38'=>1,
                '39'=>1,'40'=>1,
                '41'=>1,'42'=>1,
                '43'=>1,'44'=>1,
                ),
            
            )
        );
        
            //Change THISSSSSSSSSSSSSSSSSSSSSSSSSS!!!!!!!
        
        
/*
        Sentry::getUserProvider()->create(array(
            'email'       => 'admin@admin.com',
            'password'    => "admin",
            'first_name'  => 'John',
            'last_name'   => 'McClane',
            'activated'   => 1,
        ));
        // Assign user permissions
        $adminUser  = Sentry::getUserProvider()->findByLogin('admin@admin.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $adminUser->addGroup($adminGroup);
 
 */
        }
    
}

