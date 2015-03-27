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
        $user->email;
        $user->username ;
        return View::make('auth.edit')->with('users', $user);
    }
}
