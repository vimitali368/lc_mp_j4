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

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
}
