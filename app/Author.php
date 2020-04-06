<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    /**
     * $author = Author::create();
     * $profile = new Profile();
     * 
     * $profile->author()->associate($author)->save();
     * --------
     * $profile->author_id = 4;
     * $profile->save();
     * -----立即獲取關聯資料
     * $author = Author::with('profile')->whereKey(1)->first();
     * with中可用陣列
     * $author = Author::with(['profile','books'])->whereKey(1)->first();
     * $author 則會有 profile (App\Profile);
     */
}
