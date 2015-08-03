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
        try{
            $findgroup=Sentry::getGroupProvider()->findByName('KSK');
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){
            $findgroup=NULL;            
        }
        if ($findgroup) $findgroup->delete();
        
        try{
            $findgroup=Sentry::getGroupProvider()->findByName('UAIG 108');
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){
            $findgroup=NULL;            
        }
        
        if ($findgroup) $findgroup->delete();
        try{
            $findgroup=Sentry::getGroupProvider()->findByName('UAIG 104');
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){
            $findgroup=NULL;            
        }
        if ($findgroup) $findgroup->delete();
        
        try{
            $findgroup=Sentry::getGroupProvider()->findByName('Center GZ');
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){
            $findgroup=NULL;            
        }
        if ($findgroup) $findgroup->delete();
        
        try{
            $findgroup=Sentry::getGroupProvider()->findByName('ConTrollGroup');
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){
            $findgroup=NULL;            
        }
        if ($findgroup) $findgroup->delete();
        
        
        
        //KSK NORM
        $ksk_rights='{'
                .'"superuser":0,'
                . '"24":1,'
                . '"37":1,"38":1,'
                . '"39":1,"40":1,'
                . '"41":1,"42":1,'
                . '"43":1,"44":1'
                . '}';
        $kskgroup=Sentry::getGroupProvider()->create(array(
            'name'        => 'KSK',
            )
        );
        $queryresult=DB::update('update groups '
                . 'set permissions=? '
                . 'where name=? ',
                array($ksk_rights,$kskgroup->name)
        );
        
        //UAIG 108
        $uaig108rights='{'
                .'"superuser":0,'
                . '"6":1,"7":1,'//Schemes and Gradplans
                . '"10":1,"11":1,'//10 Прием обращений, заявлений, запросов организаций
                                  //11 Подготовка техзадания на инженерное обеспечение объекта
                . '"25":1,"26":1,"27":1,"28":1,'//Publichka, Coordinates
                . '"29":1,"30":1,"31":1,'//Adresa
                . '"32":1,"33":1,'//Adresa
                . '"35":1,"36":1'//Adresa
                . '}';
        $group108=Sentry::getGroupProvider()->create(array(
            'name'        => 'UAIG 108',
            )
        );
        $queryresult=DB::update('update groups '
                . 'set permissions=? '
                . 'where name=? ',
                array($uaig108rights,$group108->name)
        );
        
        $uaig104rights='{'
                .'"superuser":0,'
                . '"15":1,"16":1,"17":1,"18":1,"19":1}';
        $group104=Sentry::getGroupProvider()->create(array(
            'name'        => 'UAIG 104',
            )
        );
        $queryresult=DB::update('update groups '
                . 'set permissions=? '
                . 'where name=? ',
                array($uaig104rights,$group104->name)
        );
        
        //CGZ NORM
        $CGZrights=
                '{"superuser":0,"48":1,"49":1,"50":1,"51":1,"52":1,"53":1,"54":1,"55":1,"56":1,"57":1}';
        $groupCGZ=Sentry::getGroupProvider()->create(array(
            'name'        => 'Center GZ',
            )
        );    
        $queryresult=DB::update('update groups '
                . 'set permissions=? '
                . 'where name=? ',
                array($CGZrights,$groupCGZ->name)
        );
        
        //ControlGroups norm NORM
        $control_group_rights='{"superuser":0,"48":1,"49":1,"50":1,"51":1,"52":1,"53":1,"54":1,"55":1,"56":1,"57":1}';
        $gr1=Sentry::getGroupProvider()->create(array(
            'name'        => 'ConTrollGroup',
            )
        ); 
            //Change THISSSSSSSSSSSSSSSSSSSSSSSSSS!!!!!!!
        $queryresult=DB::update('update groups '
                . 'set permissions=? '
                . 'where name=? ',
                array($control_group_rights,$gr1->name)
        );
        //////////////////////////////////////////////////
        // Seeding users and select groups for them
        //////////////////////////////////////////////////
        
        //Delete test ksk users: ksk1 and ksk2
        try{
            $user = Sentry::findUserByLogin('ksk1');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();
        
        try{
            $user = Sentry::findUserByLogin('ksk2');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();
        
        //Add test ksk users: ksk1 and ksk2
        $kskuser1=Sentry::getUserProvider()->create(array(
            'email'       => 'ksk1@queueserver.local',
            'password'    => "ksk1",
            'username'    => 'ksk1',
            'first_name'  => 'ksk1',
            'last_name'   => 'ksk1',
            'activated'   => 1,
        ));
        $kskuser2=Sentry::getUserProvider()->create(array(
            'email'       => 'ksk2@queueserver.local',
            'password'    => "ksk2",
            'username'    => 'ksk2',
            'first_name'  => 'ksk2',
            'last_name'   => 'ksk2',
            'activated'   => 1,
        ));
        //Add group for: ksk1 and ksk2
        $kskuser1->addGroup($kskgroup);
        $kskuser2->addGroup($kskgroup);

        //Delete test uaig108users users
        try{
            $user = Sentry::findUserByLogin('uaig108user1');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();
        
        try{
            $user = Sentry::findUserByLogin('uaig108user2');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();        

        try{
            $user = Sentry::findUserByLogin('uaig108user3');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();                
        //Add test users: uaig108user1,uaig108user2,uaig108user3
        $uaig108user_1=Sentry::getUserProvider()->create(array(
            'email'       => 'uaig108user1@queueserver.local',
            'password'    => "uaig108user1",
            'username'    => 'uaig108user1',
            'first_name'  => 'uaig108user1',
            'last_name'   => 'uaig108user1',
            'activated'   => 1,
        ));
        $uaig108user_2=Sentry::getUserProvider()->create(array(
            'email'       => 'uaig108user2@queueserver.local',
            'password'    => "uaig108user2",
            'username'    => 'uaig108user2',
            'first_name'  => 'uaig108user2',
            'last_name'   => 'uaig108user2',
            'activated'   => 1,
        ));
        $uaig108user_3=Sentry::getUserProvider()->create(array(
            'email'       => 'uaig108user3@queueserver.local',
            'password'    => "uaig108user3",
            'username'    => 'uaig108user3',
            'first_name'  => 'uaig108user3',
            'last_name'   => 'uaig108user3',
            'activated'   => 1,
        ));
        $uaig108user_1->addGroup($group108);
        $uaig108user_2->addGroup($group108);
        $uaig108user_3->addGroup($group108);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //Delete test uaig104users users
        try{
            $user = Sentry::findUserByLogin('uaig104user1');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();
        
        try{
            $user = Sentry::findUserByLogin('uaig104user2');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();        
           
        //Add test users: uaig104user1,uaig104user2
        $uaig104user_1=Sentry::getUserProvider()->create(array(
            'email'       => 'uaig104user1@queueserver.local',
            'password'    => "uaig104user1",
            'username'    => 'uaig104user1',
            'first_name'  => 'uaig104user1',
            'last_name'   => 'uaig104user1',
            'activated'   => 1,
        ));
        $uaig104user_2=Sentry::getUserProvider()->create(array(
            'email'       => 'uaig104user2@queueserver.local',
            'password'    => "uaig104user2",
            'username'    => 'uaig104user2',
            'first_name'  => 'uaig104user2',
            'last_name'   => 'uaig104user2',
            'activated'   => 1,
        ));
        $uaig104user_1->addGroup($group104);
        $uaig104user_2->addGroup($group104);
        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        //Delete test uaig104users users
        try{
            $user = Sentry::findUserByLogin('cgz_user1');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();
        
        try{
            $user = Sentry::findUserByLogin('cgz_user2');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user=NULL;
        }
        if ($user) $user->delete();        
           
        //Add test users: uaig104user1,uaig104user2
        $cgz_user1=Sentry::getUserProvider()->create(array(
            'email'       => 'cgz_user1@queueserver.local',
            'password'    => "cgz_user1",
            'username'    => 'cgz_user1',
            'first_name'  => 'cgz_user1',
            'last_name'   => 'cgz_user1',
            'activated'   => 1,
        ));
        $cgz_user2=Sentry::getUserProvider()->create(array(
            'email'       => 'cgz_user2@queueserver.local',
            'password'    => "cgz_user2",
            'username'    => 'cgz_user2',
            'first_name'  => 'cgz_user2',
            'last_name'   => 'cgz_user2',
            'activated'   => 1,
        ));
        $cgz_user1->addGroup($groupCGZ);
        $cgz_user2->addGroup($groupCGZ);
        
        
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

