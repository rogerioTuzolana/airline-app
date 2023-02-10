<?php

namespace App\Http\Controllers\clients;

use App\Mail\MemberCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Client;
use App\Models\ApiCity;
use App\Models\MemberClient;
use App\Models\Buy;
use App\Models\Tariff;
use App\Models\TariffAirlineTicket;
use App\Models\Airline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        /*$airlines = '';
        $citys = ApiCity::get();
        $search = request('search');
        if ($search) {
            $airlines = Airline::where([
                ['name', 'like', '%'.$search.'%']
            ])->orWhere([
                ['description', 'like', '%'.$search.'%']
            ])
            ->paginate(3);
            
        }else{
            $airlines = Airline::paginate(3);
        }*/

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

        return view('member.home',["airlines"=>$airlines,"search"=>$request]);

        /*return view('member.home',[
            "airlines"=>$airlines,
            "citys"=>$citys, 
            //"fleets"=>$fleets,
            "search"=>$search,
        ]);*/
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

    public function buy_ticket(Request $request)
    {   
        
        $date = DB::table('airlines')
            ->select(
                'airlines.id',
                'airlines.time',
                'airlines.name',
                'airlines.date',
                //'tariffs.name',
                //'tariffs.category',
            )
            ->where('orige',$request->orige)
            ->where('destiny',$request->destiny)
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
            ->where('orige',$request->destiny)
            ->where('destiny',$request->orige)
            ->get();
        //dd($date_return);
        $city = ApiCity::where('key',$request->orige)->first();
        $city2 = ApiCity::where('key',$request->destiny)->first();
        return view('member.buy_ticket',[
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
        //dd($tariff_airlines2);
        return view('member.pay_ticket',[
            'data'=>$request,
            'tariff_airlines'=>$tariff_airlines,
            'tariff_airlines2'=>$tariff_airlines2,
            //'tariff'=>$tariff
        ]);
    }

    public function my_shopping(Request $request){

        $buy_tickets = [];
        $search = request('search');
        if ($search) {
            $buy_tickets = Buy::where('user_id',auth()->user()->id)
            ->where('amount',$search)
            ->Where([
                ['created_at', '<=', $search]
            ])
            
            ->WhereHas('tariff_airline_tickets', function ($query) use ($search) {
                $query->WhereHas('airline', function ($query2) use ($search) {
                    $query2->where([
                        ['name', '<=', $search]
                    ])
                    ->where([
                        ['orige', '<=', $search]
                    ])
                    ->where([
                        ['destiny', '<=', $search]
                    ]);
                });
            })
            
            ->paginate(3);
            
        }else{
            $buy_tickets = Buy::where('user_id',auth()->user()->id)->paginate(3);
            
    
        }
        
        
        return view('member.my_shopping',["buy_tickets"=>$buy_tickets, "search"=>$search]);
    }

    /*public function buy_cancelp($id){
        //dd()
        $crypted_id = Crypt::encryptString($id);
        return response()->json([
            'success' => false,
            'message' => $crypted_id
        ],200);
    }*/

    public function buy_cancel($id){
        
        $decrypted_id = Crypt::decryptString($id);
        $payment = Buy::where('id',$decrypted_id)->where('user_id',auth()->user()->id)->first();
        $payment->status_validate = false;
        $status = $payment->update();
        if ($status) {
            return response()->json([
                'success' => false,
                'message' => 'Compra cancelada com sucesso.',
            ],200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Compra não foi cancelada.',
            ],500);
        }

    }

    public function my_profile(Request $request){

        return view('member.my_profile');
    }

    public function buy_success(Request $request){
        return route()->back('success','Comprado com sucesso');
    }
    
    public function login_member(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => 'Não existe este email'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user->type != 'member'){
            return response()->json([
                'success' => false,
                'message' => 'Email ou Senha errada!',
            ],422);
        }

        $data = $request->only('email','password');

        Mail::to(/*$request->email*/'tuzolanarogerio@gmail.com')->send(new MemberCode($user));
          
        if(Auth::attempt($data)){   
            return response()->json([
                'success' => true,
                'message' => auth()->user()->type,
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Email ou Senha errada!',
            ],422);
        }
    }

    public function regist_member(Request $request)
    {
        //dd($request);
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|'/*unique:users,email'*/,
            'pin_access' => 'required|min:8|max:255|',
            //'cpassword' => 'required|min:8|same:password',
            //'accepterms' => 'required',
            //'bi' => 'required|unique:national_users,bi',
        ],
        );

        $email_exists = User::where('email',$request->email)->first();
        if ($email_exists != NULL) {
            return response()->json([
                'success' => false,
                'message' => "Já existe conta com este email.",
            ],422);
        }
        
        
        /*if ($request->accepterms != 'on') {
            return response()->json([
                'success' => false,
                'message' => "Aceite os termos.",
            ],422);
        }*/
        
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->type = 'member';
        $user->password = Hash::make($request->pin_access);
        $status = $user->save();
        $status_2 = false;

        $client = new Client();
        $client->user_id = $user->id;
        $client->title = $request->title;
        $status_2 = $client->save();
        $status_3 = false;

        $member_client = new MemberClient();
        $member_client->client_id = $client->id;
        $member_client->gender = $request->gender;
        $member_client->birthDate = str_replace("/","-",$request->birth_date);
        $member_client->preferred_language = $request->preferred_language;
        $member_client->preference_air = $request->preference_air;
        $member_client->address = $request->address;
        $status_3 = $member_client->save();

        if ($status && $status_2 && $status_3) {

            Mail::to(/*$request->email*/'tuzolanarogerio@gmail.com')->send(new MemberCode($user));
            
            return response()->json([
                'success' => false,
                'message' => 'Membro cadastrado com sucesso.',
            ],200);
            /*$data = $request->only('email','password');
            if(Auth::attempt($data)){
                if(auth()->user()->type == 'user' || auth()->user()->type == 'agents'){
                    return response()->json([
                        'success' => true,
                        'message' => auth()->user()->type,
                    ],200);
                }else {
                   return response()->json([
                    'success' => true,
                    'message' => 'admin',
                ],200);
                }
            }*/
        }else {
            //return redirect()->back()->with('fail','Algo deu errado, dados não Cadastrado');
            return response()->json([
                'success' => false,
                'message' => 'Algo deu errado, dados não Cadastrado.',
            ],500);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('homepage');
    }
}
