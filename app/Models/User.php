<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

//    protected $withCount = ['articles'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    protected $withCount = ['articles', 'comments', 'subscribedAuthors'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function isBanned() {
        return $this->can('banned');
    }

    public function likedArticles()
    {
        return $this->belongsToMany(Article::class, 'article_user_likes', 'user_id', 'article_id');
    }

    public function subscribedAuthors()
    {
        return $this->belongsToMany(User::class, 'author_reader_subscriptions', 'reader_id', 'author_id');
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'author_reader_subscriptions', 'author_id', 'reader_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
