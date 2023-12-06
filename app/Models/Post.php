<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'author_id','thumbnail','title','content','status'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id')->withTimestamps();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function getTanggal()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }

    public function getShortDate()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('d M Y');
    }
}
