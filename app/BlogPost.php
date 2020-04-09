<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;
use Carbon\Carbon;

class BlogPost extends Model
{
    // protected $table = 'blogposts';
    protected $fillable = ['title','content'];

    /*
    預設 Eloquent 會把 created_at 和 updated_at 欄位屬性轉換成 Carbon 實例，它提供了很多有用的方法，並繼承了 PHP 原生的 DateTime 類
    可以通過覆寫模型的 getDates 方法，自定義哪個欄位可以被自動轉換，或甚至完全關閉這個轉換，要完全關閉日期轉換功能，只要從 getDates 方法回傳空陣列即可
    */
    // public function getDates()
    // {
    //     return [];
    // }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    /**Save
     * 1.
     * $blogPost->comments()->save($comment);
     * 2.
     * $blogPost->comments()->saveMany([$comment1,$comment2]);
     * 
     * Query
     * 1.
     * $post = BlogPost::with('comments')->get();
     * 2.
     * $post = BlogPost::find(3);
     * $post->comments;
     */

}
