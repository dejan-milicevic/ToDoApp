<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Validator;
use Input;

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
    
    public static function isValid($data)
    {
        $validation = Validator::make($data, static::$rules);
        if ($validation->passes())
        {
            return true;
        }
        return $validation->errors();
    }

    public function getMyTodos()
    {
        return $this->todos()->orderBy('priority')->get();
    }

    public function updateMyTodos($id)
    {
        $todos = $this->todos()->find($id);
        $todos->done = Input::input('done');
        $todos->priority = Input::input('priority');
        $todos->title = Input::input('title');
        $todos->save();
        return $todos;
    }

    public function deleteMyTodo($id)
    {
        return $this->todos()->find($id)->delete();
    }

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
}
