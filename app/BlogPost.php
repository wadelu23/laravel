<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;
use Carbon\Carbon;

class BlogPost extends Model
{
    // protected $table = 'blogposts';
    protected $fillable = ['title','content'];

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)
            ->timezone(Config::get('app.timezone'))
            ->format('Y-m-d H:i:s');
    }
    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)
            ->timezone(Config::get('app.timezone'))
            ->format('Y-m-d H:i:s');
    }
}
