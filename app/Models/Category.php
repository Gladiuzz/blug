<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_category', 'category_id', 'post_id')->withTimestamps();
    }
}
