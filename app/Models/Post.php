<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $illable = [
        'title',
        'slug',
        'body',
        'active',
        'position',
        'user_id'
    ];
}
