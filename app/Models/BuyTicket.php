<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyTicket extends Model
{
    use HasFactory;
    protected $table = "buy_tickets";


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    public function tariff(){
        return $this->belongsTo(Tariff::class);
    }
}
