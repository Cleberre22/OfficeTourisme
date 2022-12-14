<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTypes extends Model
{
    use HasFactory;
    protected $fillable = ['nameEventType'];

    public function events()
    {
        return $this->belongsToMany('App\Events');
    }
}
