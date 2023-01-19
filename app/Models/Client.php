<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function regular(){
        return $this->hasOne(RegularClient::class);
    }

    public function member(){
        return $this->hasOne(MemberClient::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
