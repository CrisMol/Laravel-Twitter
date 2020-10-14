<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
	// $entry->user
	// Entry N - 1 User (relación uno a muchos)
	// Eager Loading
    public function User()
    {
    	return $this->belongsTo(User::class); //Una entry pertenece a un usuario
    }
}
