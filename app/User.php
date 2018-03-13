<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'users.name' => 10,
            'users.email' => 5,
            'users.id' => 3,
        ]
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
