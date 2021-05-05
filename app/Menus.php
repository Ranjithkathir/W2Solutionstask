<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use SoftDeletes;

    protected $table = 'menus';

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'slug', 'url'];
}
