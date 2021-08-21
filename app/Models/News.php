<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

   /*
    |--------------------------------------------------------------------------
    | Fillables 
    |--------------------------------------------------------------------------
    |
    | This defines which model attributes are allowed for mass assignment.
    | It serves as a "white list" of attributes that are mass assignable.
    |
    */
    protected $fillable = [
        'title',
        'content',
        'is_published'
    ];
}
