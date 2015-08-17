<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Todo extends Model
{
    public $timestamps = false;

    protected $table = 'todos';

    protected $fillable = ['title', 'done', 'priority'];

    public static $rules = [
        'title' => 'required',
        'priority' => 'in:null,1,2,3',
        'done' => 'boolean'
    ];

    public static function isValid($data)
    {
        $validation = Validator::make($data, static::$rules);
        if ($validation->passes())
        {
            return true;
        }
        return $validation->errors();
    }
}
