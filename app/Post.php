<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
	protected $dates = ['published_at'];

	public function author()
	{
		return $this->belongsTo(User::class);
	}

    public function getImageUrlAttribute($value)
    {
    	$imageUrl = "";
    	if (!is_null($this->image))
		{
			$imagePath = public_path() . "\img\\" . $this->image;
			if (file_exists($imagePath))
			{	
				$imageUrl = asset("img/" . $this->image);
			}	
		}
		return $imageUrl;
    }

    public function getDateAttribute($value)
    {
    	return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopePublished($query)
    {
    	return $this->orderBy('published_at', 'desc')->where("published_at", "<=", Carbon::now());
    }

    public function getBodyHtmlAttribute($value)
    {
    	return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }
}
