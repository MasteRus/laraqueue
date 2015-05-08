<?php
/**
 * app/controllers/AuthController.php
 */
class AuthController extends BaseController {

     /**
     * Отображает страницу входа
     *
     * @return Illuminate\View\View
     */
    public function getLogin()
    {
        $title = 'Вход';
        return View::make('auth.login', compact('title'));
    }

    /**
     * Аутентифицирует и редиректит в админку
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        
        Input::flash();
        
        try {
            $credentials = array(
                'username' => Input::get('username'), 
                'password' => Input::get('password')
            );
            $user = Sentry::authenticate($credentials, Input::get('remember-me'));
        } catch (Exception $e) {
            
            return Redirect::to(route('auth.login'))
                ->withErrors(array($e->getMessage()));
        }
        
        
        
        return Redirect::intended(route('admin'));
    }

    /**
     * Обрабатывает выход
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route('auth.login');
    }
    
    public function getcreateaccount()
    {
        $title = 'Создать аккаунт';
        return View::make('auth.createaccount', compact('title'));
    }
    
    public function DeleteAccount($userid)
    {
        $user = Sentry::findUserById($userid);
        $user->delete();
        
        return Redirect::route('getaccounts');
    }
    
    public function PostEditAccount($userid)
    {
        Input::flash();
        $credentials = array(
                'username' => Input::get('username'), 
                'email' => Input::get('email'), 
                'password' => Input::get('password'),
                //'activated'   => Input::get('activated'),
            );
        $id=Input::get('id');
        
      
        try
        {
            $user = Sentry::findUserById($id);
            // Update the user details
            $user->username= Input::get('username');
            $user->email = Input::get('email');
            // Get the current user groups
            // REturn current user groups by name
            // Type of result:String, filed=ID


            //GEt All Groups
            //$userGroups = $user->groups()->lists('group_id');
            $AllGroups=Sentry::findAllGroups();
            $AllGroupsById=array();
            foreach ($AllGroups as $group2)
            {
                array_push($AllGroupsById,$group2->id);
            }

            //Get checked Groups            
            $group_numbers = Input::get('groups');
            $group_numbers_by_id= array();
            if ($group_numbers)
            {
                foreach ($group_numbers as $group2)
                {
                    array_push($group_numbers_by_id,intval($group2));
                }
            }
            // Find groups to add
            $groupsToAdd    = array_intersect($AllGroupsById, $group_numbers_by_id);
            // Find groups to remove
            $groupsToRemove = array_diff($AllGroupsById, $group_numbers_by_id);
            // Add user into the groups
            foreach ($groupsToAdd as $groupId)
            {
                $group = Sentry::getGroupProvider()->findById($groupId);

                $user->addGroup($group);
            }

            // Remove the user from groups
            foreach ($groupsToRemove as $groupId)
            {
                $group = Sentry::getGroupProvider()->findById($groupId);
                $user->removeGroup($group);
            }
           
            // Update the user
            if ($user->save())
            {
                // User information was updated
            }
            else
            {
                // User information was not updated
            }
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }            
            
        //$user = Sentry::findUserById($userid);
        
        return Redirect::route('getaccounts');
    }
    
    public function postcreateaccount()
    {
        Input::flash();
        try {
            $credentials = array(
                'username' => Input::get('username'), 
                'email' => Input::get('email'), 
                'password' => Input::get('password'),
                'activated'   => true
            );
            $user = Sentry::createUser($credentials);
            //Get checked Groups            
            $group_numbers = Input::get('groups');

            if ($group_numbers)
            {
                foreach ($group_numbers as $group2)
                {
                    $group = Sentry::getGroupProvider()->findById(intval($group2));
                    $user->addGroup($group);
                }
            }
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (Exception $e) {
            return Redirect::to(route('auth.createaccount'))
            ->withErrors(array($e->getMessage()));
        }
        return Redirect::route('getaccounts');
    }
    public function getaccounts()
    {
        $users = User::get();
        //return View::make('index')->with('posts', $users);
       
        return View::make('auth.index')->with('users', $users);
    }
    
    public function GetSelectedAccount($userid)
    {
       
        $user = Sentry::findUserById($userid);
        
        return View::make('auth.edit')->with('users', $user);
    }
    
    public function getloggedusers()
    {
         $users1 = Sentry::findAllUsers();
         $checked_logged=array();
         
         //$users = Sentry::user()->all();

         foreach ($users1 as $user)
            {
                
                if (Sentry::check())
                //if ( ! $user->check())
                {
                    $checked_logged[$user->id]=1;
                    // User is not logged in, or is not activated
                }
                //else
                {
                    $checked_logged[$user->id]=0;
                    // User is logged in
                }
            }
        //return View::make('index')->with('posts', $users);
        
        return View::make('auth.loggedusers')
                ->with('users', $users1)
                ->with('checked_logged',$checked_logged);
    }
}
