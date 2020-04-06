<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    /**
     * $profile = Profile::find(5);
     * $profile->author;
     * $profile 會多個 author (App\Author)
     */
}
