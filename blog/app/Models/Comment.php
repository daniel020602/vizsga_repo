<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Post;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['post_id','comment',];
    public function Post(){
        return $this->belongsTo(Post::class);
    }
}
