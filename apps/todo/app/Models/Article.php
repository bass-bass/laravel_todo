<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'status',
        'user_id',
        'score',
        'magnitude',
        'emotion_id',
        'updated_at',
        'category_id',
    ];

    //Userとのリレーション
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    //Commentとのリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    //Categoryとのリレーション
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //Likeとのリレーション
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //いいねされてるかの判定
    public function isLiked(){
        $like = Like::where('user_id', Auth::id())->where('article_id', $this->id)->first();
        if($like !== null){
            return true;
        }
        return false;
    }
    //Emotionとのリレーション
    public function emotion()
    {
        return $this->belongsTo(Emotion::class);
    }
    //公開の記事返す
    public function isPublic()
    {
        return $this->status === '1';
    }
    //限定公開
    public function isLimited()
    {
        return $this->status === '2';
    }
    //非公開
    public function isNotPublic()
    {
        return $this->status === '3';
    }
    //これだと正否しか帰らなそう、$this->where('status','1')->get()とかできない？
}
