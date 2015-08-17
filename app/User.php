<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Validator;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    public $timestamps = false;
    
    public static $rules = [
        'email' => 'required|unique:users,email|email',
        'password' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'company' => 'required',
        'country' => 'required'
    ];
    
    public static $errors;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'first_name', 'last_name', 'company', 'country'];
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

//    public function authenticateLogin()
//    {
//        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]))
//        {
//            return true;
//        }
//
//        return false;
//    }
    
    public static function isValid($data)
    {
        $validation = Validator::make($data, static::$rules);
        
        if ($validation->passes())
        {
            return true;
        }
        
        static::$errors = $validation->errors();
        return false;
    }

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
}
