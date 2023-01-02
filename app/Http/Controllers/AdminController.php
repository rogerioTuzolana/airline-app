<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use App\Models\Perk;
use App\Models\Tariff;
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
            $perk->model = $request->model;
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
