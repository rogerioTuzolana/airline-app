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

  
    public function buy_ticket()
    {
        return view('buy_ticket');
    }

    public function pay_ticket(Request $request){
        //dd($request);
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
        ->where('airlines.id',$request->date)
        ->get();

        $tariff_airlines2 =[];
        if(isset($request->date_return)){
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
            ->where('airlines.id',$request->date_return)
            ->get();
        }
        
        return view('member.pay_ticket',[
            'data'=>$request,
            'tariff_airlines'=>$tariff_airlines,
            'tariff_airlines2'=>$tariff_airlines2,
            //'tariff'=>$tariff
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
