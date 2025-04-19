<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image'];

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
