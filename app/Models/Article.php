<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'articles';
    protected $guarded = false;

    protected $withCount = ['likedUsers'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'article_user_likes', 'article_id', 'user_id');
    }
}
