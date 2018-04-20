<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = "role";

    protected $fillable = [
        'name', 'slug',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
