<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
	// $entry->user
	// Entry N - 1 User (relación uno a muchos)
	// Eager Loading
    public function User()
    {
    	return $this->belongsTo(User::class); //Una entry pertenece a un usuario
    }

    public function setTitleAttribute($value)
    {
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = Str::slug($value);
    }

    /*public function getRouteKeyName()
	{
	    return 'slug';
	}*/

	public function getUrl()
	{
		return url("entries/$this->slug-$this->id");
	}
}
