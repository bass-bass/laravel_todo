<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    protected $fillable = ['code'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
