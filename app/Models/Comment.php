<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['content','user_id','post_id'];

    public function users(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): BelongsTo 
    {
        return $this->belongsTo(Post::class);
    }
}
