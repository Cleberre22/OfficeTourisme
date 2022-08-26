<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceTypes extends Model
{
    use HasFactory;
    protected $fillable = ['namePlaceType'];

    public function places()
    {
        return $this->belongsToMany('App\Places');
    }
}
