<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Client;
use App\Models\ApiCity;
use App\Models\MemberClient;
use App\Models\BuyTicket;
use App\Models\Tariff;
use App\Models\Airline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function buy_ticket(Request $request)
    {   
        $orige = Crypt::decryptString($request->orige);
        $destiny = Crypt::decryptString($request->destiny);
        //dd($destiny.' '.$orige);
        
        $date = DB::table('airlines')
            ->select(
                'airlines.id',
                'airlines.time',
                'airlines.name',
                'airlines.date',
                //'tariffs.name',
                //'tariffs.category',
            )

            ->where('orige',$orige)
            ->where('destiny',$destiny)
            ->get();

        $date_return = DB::table('airlines')
            ->select(
                'airlines.id',
                'airlines.time',
                'airlines.name',
                'airlines.date',
                //'tariffs.name',
                //'tariffs.category',
            )
            ->where('orige',$destiny)
            ->where('destiny',$orige)
            ->get();
        //dd($date_return);
        $city = ApiCity::where('key',$orige)->first();
        $city2 = ApiCity::where('key',$destiny)->first();
        return view('buy_ticket',[
            'date'=>$date,
            'date_return'=>$date_return,
            'route'=>true, 
            'city'=>$city, 
            'city2'=>$city2,
            'status'=>true,
        ]);
    }

    public function pay_ticket(Request $request){
        
        $tariff_airlines = DB::table('airlines')
        //->groupBy(DB::raw('YEAR(created_at)'))
        ->select(
            'airlines.id as airline_id',
            'airlines.time',
            'airlines.name',
            'airlines.date',
            'tariffs.name',
            'tariffs.amount',
            'tariffs.id as tariff_id',
            'tariff_airlines.airline_id',
            'tariff_airlines.tariff_id',
            //'tariffs.category',
        )

        ->join('tariff_airlines','tariff_airlines.airline_id','=','airlines.id')
        ->join('tariffs','tariffs.id','=','tariff_airlines.tariff_id')
        ->where('airlines.id',$request->airline_id)
        ->get();

        $tariff_airlines2 =[];
        if(isset($request->route) && $request->route == 'goBack'){
            $tariff_airlines2 = DB::table('airlines')
            //->groupBy(DB::raw('YEAR(created_at)'))
            ->select(
                'airlines.id as airline_id',
                'airlines.time',
                'airlines.name',
                'airlines.date',
                'tariffs.name',
                'tariffs.amount',
                'tariffs.id as tariff_id',
                'tariff_airlines.airline_id',
                'tariff_airlines.tariff_id',
                //'tariffs.category',
            )
            
            ->join('tariff_airlines','tariff_airlines.airline_id','=','airlines.id')
            ->join('tariffs','tariffs.id','=','tariff_airlines.tariff_id')
            ->where('airlines.id',$request->airline_id_return)
            ->get();
        }
        
        return view('pay_ticket',[
            'data'=>$request,
            'tariff_airlines'=>$tariff_airlines,
            'tariff_airlines2'=>$tariff_airlines2,
            'status'=>true,
            //'tariff'=>$tariff
        ]);
    }
    
    public function buy_cancel(Request $request){
        $payment = BuyTicket::where('id',$request->buy_id)->where('user_id',auth()->user()->id)->first();

        if (intval($request->status_validate) == 1) {
            $payment->status_validate = false;
            //$payment->status = 'approved';
        }/*else {
            $payment->status_validate = true;
            //$payment->status = 'denied';
        }*/
        
        $status = $payment->update();
        if ($status) {
            return redirect()->back()->with('success','Compra cancelada com sucesso');
        }else{
            return redirect()->back()->with('fail','A compra não foi cancelada');
        }
    }
    
    public function date_airlines(Request $request){
        
        $data = DB::table('airlines')
            //->groupBy(DB::raw('YEAR(created_at)'))
            ->select(
                'airlines.id',
                'airlines.time',
                'airlines.name',
                'airlines.date',
                //'tariffs.name',
                //'tariffs.category',
            )
            
            //->join('tariffs','airlines.tariff_id','=','tariffs.id')
            //->join('tariff_airlines','tariff_airlines.airline_id','=','airlines.id')
            //->join('tariff_airlines','tariff_airlines.airline_id','=','airlines.id')

            //->where('airlines.tariff_id','tarrifs.id')
            ->where('orige',$request->orige)
            ->where('destiny',$request->destiny)
            //->orderBy('created_at','ASC')
            ->get();
        //dd($data);
        if (isset($data)) {
            return response()->json([
                'success' => true,
                'data' => $data,
            ],200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Algo deu errado.',
        ],422);
    }


}
