<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'active',
        'position',
        'user_id',
        'image_id'
    ];

    public function scopeActive()
    {
        return $this->where('active', 1);
    }
}
