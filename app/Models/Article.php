<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Article extends Model
{
    use HasFactory, SoftDeletes;
    use Sortable;

    protected $table = 'articles';
    protected $guarded = false;

    protected $withCount = ['likedUsers', 'comments'];

    public $sortable = ['view_count', 'liked_users_count', 'comments_count'];
    protected $sortableAs = ['view_count', 'liked_users_count', 'comments_count'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'article_user_likes', 'article_id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

}
