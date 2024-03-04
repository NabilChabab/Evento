<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function authenticated(Request $request, $user)
    {
        $role = $user->roles->first();

        if ($role) {
            switch ($role->name) {
                case 'admin':
                    return redirect('/admin/dashboard');
                case 'organizer':
                    return redirect('/organizer/account');
                case 'spectator':
                    return redirect('user/home')->with('status', "Welcome Back find a Tickets!");
                default:
                    return redirect($this->redirectTo);
            }
        } else {
            return redirect($this->redirectTo)->with('status', 'Your account does not have role assigned. Please contact administrator.');
        }
    }
}
