<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // blog_post_id
    public function blogPost()
    {
        return $this->belongsTo('App\BlogPost');
        // return $this->belongsTo('App\BlogPost','post_id','blog_post_id');
    }
    /**Save
     * 1.
     * $comment->blogPost()->associate($blogPost)->save();
     * 2.
     * $comment->blog_post_id = 2;
     * $comment->save();
     *
     * Query
     * 1.
     * $comment = Comment::find(1);
     * $comment->blogPost;
     */
}
