<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;
    protected $table = "buys";


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tariff_airline_tickets(){
        return $this->hasMany(TariffAirlineTicket::class);
    }

    
}
