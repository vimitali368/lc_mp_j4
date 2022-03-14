<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleUserLike extends Model
{
    use HasFactory;
    protected $table = 'article_user_likes';
    protected $guarded = false;
}
