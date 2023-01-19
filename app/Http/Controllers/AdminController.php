<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use App\Models\Perk;
use App\Models\Tariff;
use App\Models\Airline;
use App\Models\PerkTariff;
use App\Models\TariffAirline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard'/*,['clients'=>$clients*/);
    }

    public function login(Request $request){
        return view('admin.admin_login');
    }

    public function fleets(){
        
        $fleets = '';
        $search = request('search');
        if ($search) {
            $fleets = Fleet::where([
                ['brand', 'like', '%'.$search.'%']
            ])->orWhere([
                ['model', 'like', '%'.$search.'%']
            ])
            ->orWhere([
                ['capacity', 'like', '%'.$search.'%']
            ])
            ->paginate(3);
            
        }else{
            $fleets = Fleet::paginate(3);
        }
        
        return view('admin.fleets',["fleets"=>$fleets, "search"=>$search]);
    }
    
    public function store_fleet(Request $request){
        $status = false;
        if ($request->fleet_id!='') {
            $fleet = Fleet::find($request->fleet_id);
            $fleet->brand = $request->brand;
            $fleet->model = $request->model;
            $fleet->capacity = $request->capacity;
            $status = $fleet->update();
        }else {
            $fleet = new Fleet;
            $fleet->brand = $request->brand;
            $fleet->model = $request->model;
            $fleet->capacity = $request->capacity;
            $status = $fleet->save();
        }
        if ($request->fleet_id!='') {
            if ($status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Frota adicionado com sucesso.',
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Frota não editado.',
                ],422);
            }
        }
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => 'Frota adicionado com sucesso.',
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Frota não adicionado.',
        ],422);
    }

    public function tariffs(){
        $tariffs = '';
        $search = request('search');
        if ($search) {
            $tariffs = Tariff::where([
                ['name', 'like', '%'.$search.'%']
            ])->orWhere([
                ['category', 'like', '%'.$search.'%']
            ])
            ->orWhere([
                ['amount', 'like', '%'.$search.'%']
            ])
            ->paginate(3);
            
        }else{
            $tariffs = Tariff::paginate(3);
        }
        
        return view('admin.tariffs',["tariffs"=>$tariffs, "search"=>$search]);
    }

    public function store_tariff(Request $request){
        $status = false;
        if ($request->tariff_id!='') {
            $tariff = Tariff::find($request->tariff_id);
            $tariff->name = $request->name;
            $tariff->category = $request->category;
            $tariff->amount = $request->amount;
            $status = $tariff->update();
        }else {
            $tariff = new Tariff;
            $tariff->name = $request->name;
            $tariff->category = $request->category;
            $tariff->amount = $request->amount;
            $status = $tariff->save();
        }

        if ($request->tariff_id!='') {
            if ($status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tarifa adicionada com sucesso.',
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tarifa não editada.',
                ],422);
            }
        }
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => 'Tarifa adicionada com sucesso.',
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Tarifa não adicionada.',
        ],422);
    }

    public function perks(){
        $perks = '';
        $search = request('search');
        if ($search) {
            $perks = Perk::where([
                ['name', 'like', '%'.$search.'%']
            ])->orWhere([
                ['description', 'like', '%'.$search.'%']
            ])
            ->paginate(3);
            
        }else{
            $perks = Perk::paginate(3);
        }
        $tariffs = Tariff::get();
        
        return view('admin.perks',["perks"=>$perks,"tariffs"=>$tariffs, "search"=>$search]);
    }

    public function store_perk(Request $request){
        $status = false;
        if ($request->perk_id!='') {
            $perk = Perk::find($request->perk_id);
            $perk->name = $request->name;
            $perk->description = $request->description;
            $status = $perk->update();
        }else {
            $perk = new Perk;
            $perk->name = $request->name;
            $perk->description = $request->description;
            $status = $perk->save();
        }

        if ($request->perk_id!='') {
            if ($status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Regalia adicionada com sucesso.',
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Regalia não editada.',
                ],422);
            }
        }
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => 'Regalia adicionada com sucesso.',
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Regalia não adicionada.',
        ],422);
    }

    public function perk_delete(Request $request){

        $perk = Perk::findOrFail($request->perk_id);
        $delete = $perk->delete();
        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Regalia eliminado.',
            ],200);        
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Regalia não eliminado.',
            ],422);
        }
    }

    public function change_status_perk(Request $request){
        $status = false;
        if ($request->perk_tariff_id!='') {
            $perk_tariff = PerkTariff::find($request->perk_tariff_id);
            $perk_tariff->status = $request->status;
            $status = $perk_tariff->update();
        }else {
            $perk_tariff = new PerkTariff;
            $perk_tariff->status = $request->status;
            $perk_tariff->perk_id = $request->perk_id;
            $perk_tariff->tariff_id = $request->tariff_id;
            $status = $perk_tariff->save();
        }

        if ($request->perk_tariff_id!='') {
            if ($status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Estado da regalia alterada com sucesso.',
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Estado da regalia não editada.',
                ],422);
            }
        }
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => 'Estado da regalia adicionada com sucesso.',
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Estado da regalia não adicionada.',
        ],422);
    }

    public function store_perk_tariff(Request $request){
        $status = false;
        if ($request->perk_tariff_id!='') {
            $perk_tariff = PerkTariff::find($request->perk_tariff_id);
            $perk_tariff->description = $request->description;
            $perk_tariff->amount = $request->amount;
            $status = $perk_tariff->update();
        }else {
            $perk_tariff = new PerkTariff;
            $perk_tariff->description = $request->description;
            $perk_tariff->amount = $request->amount;
            $perk_tariff->perk_id = $request->perk_id;
            $perk_tariff->tariff_id = $request->tariff_id;
            $status = $perk_tariff->save();
        }

        if ($request->perk_tariff_id!='') {
            if ($status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Condições da regalia editada com sucesso.',
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Condições da regalia não editada.',
                ],422);
            }
        }
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => 'Condições da regalia adicionada com sucesso.',
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Condições da regalia não adicionada.',
        ],422);
    }

    public function airlines(){
        $airlines = '';
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
        }
        $tariffs = Tariff::get();
        $fleets = Fleet::get();
        return view('admin.airlines',[
            "airlines"=>$airlines,
            "tariffs"=>$tariffs, 
            "fleets"=>$fleets,
            "search"=>$search,
        ]);
    }

    public function store_airline(Request $request){
        $status = false;
        if ($request->airline_id!='') {
            $airline = Airline::find($request->airline_id);
            $airline->name = $request->name;
            $airline->category = $request->category;
            $airline->orige = $request->orige;
            $airline->destiny = $request->destiny;
            $airline->fleet_id = $request->fleet_id;
            $airline->date = $request->date;
            $airline->date_return = $request->date_return;
            $airline->time = $request->time;
            $status = $airline->update();
        }else {
            $airline = new Airline;
            $airline->name = $request->name;
            $airline->category = $request->category;
            $airline->orige = $request->orige;
            $airline->destiny = $request->destiny;
            $airline->fleet_id = $request->fleet_id;
            $airline->date = $request->date;
            $airline->date_return = $request->date_return;
            $airline->time = $request->time;
            $status = $airline->save();
        }

        if ($request->airline_id!='') {
            if ($status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Voo editado com sucesso.',
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Voo não editado.',
                ],422);
            }
        }
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => 'Voo adicionado com sucesso.',
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Voo não adicionado.',
        ],422);
    }

    public function change_status_tariff_airline(Request $request){
        $status = false;
       
        if ($request->tariff_airline_id!='') {
            $tariff_airline = TariffAirline::find($request->tariff_airline_id);
            $tariff_airline->status = $request->status;
            $status = $tariff_airline->update();
        }else {
            
            $tariff_airline = new TariffAirline;
            $tariff_airline->airline_id = $request->airline_id;
            $tariff_airline->tariff_id = $request->tariff_id;
            $tariff_airline->status = $request->status;
            $status = $tariff_airline->save();
        }

        if ($request->tariff_airline_id!='') {
            if ($status) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tarifa do voo alterada com sucesso.',
                ],200);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tarifa do voo não alterada.',
                ],422);
            }
        }
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => 'Tarifa do voo adicionada com sucesso.',
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Tarifa do voo não adicionada.',
        ],422);
    }


    public function auth(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => 'Não existe este email'
        ]);
        $data = $request->only('email','password');

        if(Auth::attempt($data)){
            if(auth()->user()->type == 'admin'){
                return redirect()->route('dashboard');
            }
            return redirect()->back()->with('fail','Email ou Senha errada');
        }else{
            return redirect()->back()->with('fail','Email ou Senha errada');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin_login');
    }

    public function create(Request $request){
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|'/*unique:users,email'*/,
            'password' => 'required|min:8|max:255|',
            //'cpassword' => 'required|min:8|same:password',
            //'accepterms' => 'required',
        ],
        );

        $email_exists = User::where('email',$request->email)->first();
        if ($email_exists != NULL) {
            return redirect()->back()->with('fail','Já existe está conta.');
        }

        if($request->type != 'admin'){
            return redirect()->back()->with('fail','Sem autorização para criar conta');
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
        $user->type = $request->type;
        $user->password = Hash::make($request->password);
        $status = $user->save();


        if ($status) {

            $data = $request->only('email','password');
            if(Auth::attempt($data)){
                return redirect()->route('dashboard');
            }
        }else {
            return redirect()->back()->with('fail','Algo deu errado, dados não Cadastrado');
            
        }
    }

}
