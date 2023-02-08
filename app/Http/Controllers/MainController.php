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

    public function airlines(Request $request){
        $airlines ='';
        $city = '';
        $city2 = '';
        $orige_search = request('orige');
        $destiny_search = request('destiny');
        $date_search = request('date');
        $amount_search = request('amount');
        if (isset($orige_search) && isset($destiny_search)) {
            $city = ApiCity::where('name', $orige_search)->first();
            $city2 = ApiCity::where('name', $destiny_search)->first();
            //dd($city.' '.$city2);
        }
        //dd($request);
        if (isset($request->status_search)) {
            
            $airlines = Airline::where('orige',$orige_search)
            ->where('destiny',$destiny_search)
            ->Where([
                ['date', '<=', $date_search??'9999-12-12']
            ])
            
            ->WhereHas('tariffs', function ($query) use ($amount_search) {
                $query->WhereHas('tariff', function ($query2) use ($amount_search) {
                    $query2->where([
                        ['amount', '<=', doubleval($amount_search)]
                    ]);
                });
            })
            ->groupBy(['orige','destiny'])
            ->paginate(2);    
            //dd($airlines);
        }else{
            
            $airlines = DB::table('airlines')
            ->select(['id','orige','destiny','category','date','time'])
            ->groupBy(['orige','destiny'])
            ->paginate(2);
        }

        return view('airlines',["airlines"=>$airlines,"search"=>$request]);
    }

}
