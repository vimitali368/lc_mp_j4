<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorReaderSubscriptions extends Model
{
    use HasFactory;

    protected $table = 'author_reader_subscriptions';
    protected $guarded = false;
}
