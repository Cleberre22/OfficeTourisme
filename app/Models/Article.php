<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['titleArticle', 'contentArticle', 'image', 'user_id'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
