<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function rPost()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function rReply()
    {
        return $this->hasMany(Reply::class);
    }
}
