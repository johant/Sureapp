<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

protected function authenticated( $user)
{
    $role = Auth::user()->role_id;
    $roles = Role::find($role);
     if($roles->name == 'Admin') return Redirect()->route('dashboard');
     if($roles->name == 'Staff') return Redirect()->route('home');
     if($roles->name == 'Coach') return Redirect()->route('dashboard');
}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
