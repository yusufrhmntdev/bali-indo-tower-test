<?php

namespace App\Models;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['news_id','user_id','comment'];

  
    public function news()
    {
        return $this->belongsTo(News::class,'id','news_id');
    }
}
