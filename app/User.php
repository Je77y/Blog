<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin()
    {
        $check = $this->role_id === 1 ? true : false;
        return $check;
    }

    public function isAdmin() 
    {
        $check = $this->role_id === 2 ? true : false;
        return $check;
    }

    public function isAuthro() 
    {
        $check = $this->role_id === 3 ? true : false;
        return $check;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function role() 
    {
        return $this->belongsTo(Role::class);
    }
}
