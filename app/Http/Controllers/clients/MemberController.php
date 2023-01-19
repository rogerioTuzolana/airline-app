<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Client;
use App\Models\ApiCity;
use App\Models\MemberClient;
use App\Models\Airline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airlines = '';
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
        }

        return view('member.home',[
            "airlines"=>$airlines,
            "citys"=>$citys, 
            //"fleets"=>$fleets,
            "search"=>$search,
        ]);
    }

    public function login_member(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => 'Não existe este email'
        ]);
        $data = $request->only('email','password');

        if(Auth::attempt($data)){
            if(auth()->user()->type == 'member'){
                return response()->json([
                    'success' => true,
                    'message' => auth()->user()->type,
                ],200);
            }else {
               return response()->json([
                'success' => false,
                'message' => 'Email ou Senha errada.',
            ],422);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Email ou Senha errada.',
            ],422);
        }
    }
    /**
     * Show the form for creating a new resource member pdc.
     *
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('/');
    }
}
