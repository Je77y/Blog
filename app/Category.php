<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
	protected $fillable = ['title, slug, created_at, updated_at'];

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

	// 'id' ==> 'slug'
    public function getRouterKeyName()
    {
    	return 'slug';
    }
}
