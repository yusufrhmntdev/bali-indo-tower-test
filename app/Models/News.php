<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';   
    protected $fillable = [
        'title', 'description','image',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class,'news_id','id');
    }
}
