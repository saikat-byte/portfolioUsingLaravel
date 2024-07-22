<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    public function rPost()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function rComment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
