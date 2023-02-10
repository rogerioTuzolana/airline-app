<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffAirlineTicket extends Model
{
    use HasFactory;
    protected $table = "tariff_airline_tickets";

    /*public function tariff(){
        return $this->hasMany(Tariff::class);
    }*/

    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    public function tariff(){
        return $this->belongsTo(Tariff::class);
    }


}
