<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Follow;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','user_id', 'email', 'password','image','overview'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Articleとのリレーション
    public function articles(){
        return $this->hasMany(Article::class);
    }
    //Commentとのリレーション
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // フォローしてるユーザー
    public function follows()
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'following_user_id', 'followed_user_id');
    }
    // フォロワー
    public function followers()
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'followed_user_id', 'following_user_id');
        
    }
    //Followされてるかの判定
    //$user->isFollowed()でAuth::user()が$userにフォローされているか判定
    //ここで下のメソッド内の$thisは$userを表す
    public function isFollowed(){
        $follow = Follow::where('followed_user_id', Auth::id())->where('following_user_id', $this->id)->first();
        if($follow !== null){
            return true;
        }
        return false;
    }
    //Followしているか判定
    //$user->isFollowing()でAuth::user()が$userをフォローしているか判定
    public function isFollowing(){
        $follow = Follow::where('following_user_id', Auth::id())->where('followed_user_id', $this->id)->first();
        if($follow !== null){
            return true;
        }
        return false;
    }
    //Likeとのリレーション
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
