<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'article_id'
    ];
    //Userとのリレーション
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Articleとのリレーション
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
