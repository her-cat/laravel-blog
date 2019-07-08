<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'slug', 'title', 'excerpt', 'content', 'reply_count', 'view_count',
    ];
}
