<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $timestamps = false;

    protected $table = 'todos';

    protected $fillable = ['title', 'done', 'priority'];
}
