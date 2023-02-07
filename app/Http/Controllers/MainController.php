<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\ApiCity;
use App\Models\MemberClient;
use App\Models\BuyTicket;
use App\Models\Tariff;
use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //

    public function index(){
        
        $airlines = DB::table('airlines')
        ->select(['id','orige','destiny','category','date','time'])
        ->groupBy(['orige','destiny'])
        ->paginate(3);
        //dd($airlines);
        
        return view('welcome',["airlines"=>$airlines]);
    }

    public function comprar_bilhete(Request $request){

        return view('main.bilhete');
        
    }

    
}
