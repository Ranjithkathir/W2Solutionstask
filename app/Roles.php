<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Roles extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'slug', 'permissions'];

    public function users(){
        return $this->belongsToMany(User::class, 'roles_users');
    }

    public function menus(){
        return $this->belongsToMany(Menus::class, 'menus_roles', 'role_id', 'menu_id');
    }
}
