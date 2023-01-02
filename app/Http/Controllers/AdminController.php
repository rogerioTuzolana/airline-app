<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
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
        return view('admin.tariffs');
    }
    
    public function perks(){
        return view('admin.perks');
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
