<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers;
use Input;
use Redirect;
use Hash;
use App\Services\UserService;
use Auth;

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
    
    public function home() // /
    {
        return Redirect::to('/users');
    }

    public function login() // /login
    {
        return view('/login');
    }
    
    public function logout() // /logout
    {
        Auth::logout();
        return Redirect::to('/login');
    }
    
    public function index() // /users
    {
        $users = User::all();
        $user = Auth::user();
        return view('/users/index', ['users' => $users, 'user' => $user]);
    }

    public function create() // /users/create
    {
        return view('/users/create');
    }
    
    public function store() // /users/store
    {
        if (($errors = User::isValid(Input::all())) === true)
        {
            $userService = new UserService();
            $userService->createUser(Input::all());

            return Redirect::to('users');
        }
        return Redirect::back()
            ->withInput()
            ->withErrors($errors);
    }
}