<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $fillable = ['namePlace', 'descriptionPlace', 'imagePlace','adressPlace', 'latitudePlace', 'longitudePlace', 'place_types_id'];

    public function placeTypes()
    {
        return $this->hasMany('App\PlaceTypes');
    }

}
