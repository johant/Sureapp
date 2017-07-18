<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin/Users.index',compact('users'));
    }
    public function create($value='')
    {
        $roles = Role::all();
        return view('Admin/Users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'username' => 'required|unique:users',
         'email'  => 'required|email|max:255|unique:users',
         'password'  => 'required|min:6|max:20|confirmed',
        'password_confirmation' => 'required|same:password',
        'role_id'  => 'required'
        ]);
        $user = New User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role_id = $request->get('role_id');
        $user->remember_token =str_random(64);
        $user->save();
        return back()->with('flash', 'Se ha creado el Usuario '.  $user->name. '!!');
    }
}
