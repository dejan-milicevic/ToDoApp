<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers;
use Input;
use Redirect;
use Hash;
use App\Services\UserService;

class UsersController extends Controller
{

	/**
    * Show the profile for the given user.
    *
    * @param  int  $id
    * @return Response
    */
    
    public function authenticate()
    {
        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]))
        {
            // Authentication passed...
            return Redirect::to('/users');
        }
        return Redirect::back()->withInput();
    }
    
    public function home()
    { // Route: '/'
        return Redirect::to('/users');
    }

    public function login()
    { // Route: '/login'
        return view('/login');
    }
    
    public function logout()
    { // Route: '/logout'
        Auth::logout();
        return Redirect::to('/login');
    }
    
    public function index()
    { // Route: '/users'
        $users = User::all();
        $user = Auth::user();
        return view('/users/index', ['users' => $users, 'user' => $user]);
    }

    public function create()
    { // Route: '/users/create'
        return view('/users/create');
    }
    
    public function store()
    { // Route: '/users/store'
        
        if ( ! User::isValid(Input::all()))
        {
            return Redirect::back()
                ->withInput()
                ->withErrors(User::$errors);
        }

        $userService = new UserService();
        $userService->createUser(Input::all());

        return Redirect::to('users');
    }
}