<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReaderAuthorSubscriptions extends Model
{
    use HasFactory;

    protected $table = 'reader_author_subscriptions';
    protected $guarded = false;
}
