<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
