<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = ['nameEvent', 'descriptionEvent', 'imageEvent', 'priceEvent', 'startDateEvent', 'endDateEvent', 'event_types_id', 'places_id'];

    public function eventTypes()
    {
        return $this->hasMany('App\EventTypes');
    }
}
