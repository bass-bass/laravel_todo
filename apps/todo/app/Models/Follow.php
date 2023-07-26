<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['following_user_id', 'followed_user_id'];

    //Userとのリレーション
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
