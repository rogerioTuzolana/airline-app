<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    public function tariffs(){
        //return $this->belongsTo(Serie::class);
        return $this->hasMany(TariffAirline::class);
    }

    

}
