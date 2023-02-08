<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffAirline extends Model
{
    use HasFactory;

    public function tariff(){
        return $this->belongsTo(Tariff::class);
        //return $this->hasMany(Tariff::class);
    }

    public function airlines(){
        return $this->belongsTo(Airline::class);
        //return $this->hasMany(Airline::class);
    }
}
