<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Client;
use App\Models\RegularClient;
use App\Models\MemberClient;
use App\Models\Buy;
use App\Models\Airline;
use App\Models\TariffAirlineTicket;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Omnipay\Common\Exception\OmnipayException;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    //
    private $gateway;
    
    public function __construct(Request $request)
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->initialize(array(
            'clientId' => env('PAYPAL_CLIENT_ID'),
            'secret'   => env('PAYPAL_CLIENT_SECRET'),
            'testMode' => true, // Or false when you are ready for live transactions
         ));
        /*$this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);*/
    }

    public function pay(Request $request){
        if (empty($request->tariff_id)) {
            return redirect()->back()->with('error','Escolhe uma tarifa para pagar o bilhete');
        }

        if (isset($request->points) && doubleval($request->points) > auth()->user()->client->member->points) {
            return redirect()->back()->with('error','O valor é superior do que o ponto acumulado');
        }
        
        $request->session()->put('data',[
            'airline_id'=>$request->airline_id,
            'n_ticket'=>$request->n_ticket,
            'tariff_id'=>$request->tariff_id,
            'return_airline_id'=>$request->return_airline_id,
            'return_tariff_id'=>$request->return_tariff_id,
            'n_ticket_return'=>$request->n_ticket_return,
            'route'=>$request->route,
            'points'=>$request->points
        ]);

        $tariff = Tariff::find($request->tariff_id);
        $tariff2 = Tariff::find($request->return_tariff_id);

        try {
            $response = $this->gateway->purchase(array(
                'amount'=>
                    isset($request->points)?
                    ($tariff->amount*$request->n_ticket)-doubleval($request->points)
                    :(isset($tariff2)?
                        ($tariff->amount*$request->n_ticket)+($tariff2->amount*$request->n_ticket_return)
                        :($tariff->amount*$request->n_ticket)),
                'currency'=>env('PAYPAL_CURRENCY'),
                'returnUrl'=>route('success'),
                'cancelUrl'=>url('error'),
            ))->send();
            
            if ($response->isSuccessful()) { 
                if ($response->isRedirect()) {
                    
                    $ref = $response->getTransactionReference();
                    return $response->redirect();
                }else{
                    $response->getMessage();
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
    
    public function success(Request $request){
        $data = $request->session()->get('data');
        //dd($data);
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'=>$request->input('PayerID'),
                'transactionReference'=>$request->input('paymentId'),
            ));

            $response = $transaction->send();
            if ($response->isSuccessful()) { 
                $arr = $response->getData();
                
                DB::beginTransaction();
                try{
                    $payment = new Buy();
                    $payment->user_id = auth()->user()->id;
                    $payment->type = $data["route"];

                    $payment->reference_code = $request->input('paymentId');
                    $payment->user_id = auth()->user()->id;
                    //$payment->payment_id = $arr['id'];
                    $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr['payer']['payer_info']['email'];
                    $payment->method = 'paypal';
                    $payment->amount = $arr['transactions'][0]['amount']['total'];
                    $payment->currency = env('PAYPAL_CURRENCY');
                    $payment->status = $arr['state'];
                    $payment->save();
                    
                    $tariff_airline_ticket = new TariffAirlineTicket;
                    $tariff_airline_ticket->tariff_id = $data["tariff_id"];
                    $tariff_airline_ticket->airline_id = $data["airline_id"];
                    $tariff_airline_ticket->n_ticket = $data["n_ticket"];
                    $tariff_airline_ticket->buy_id = $payment->id;
                    $tariff_airline_ticket->save();

                    if($data["route"] =='goBack'){
                        $tariff_airline_ticket = new TariffAirlineTicket;
                        $tariff_airline_ticket->tariff_id = $data["return_tariff_id"];
                        $tariff_airline_ticket->airline_id = $data["return_airline_id"];
                        $tariff_airline_ticket->n_ticket = $data["n_ticket_return"];
                        $tariff_airline_ticket->buy_id = $payment->id;
                        $tariff_airline_ticket->save();
                    }


                    $airline = Airline::find($data["airline_id"]);
                     
                    if (isset($data["points"])) {
                        $member = MemberClient::find(auth()->user()->client->member->id);
                        $member->points = $member->points - $data["points"];
                        $member->update();
                    }

                    $member = MemberClient::find(auth()->user()->client->member->id);
                    $member->points = $member->points + ($airline->miles*10)/100;
                    
                    $member->update();

                    DB::commit();
                    
                    $request->session()->pull('data',[]);
                    return redirect()->back()->with('success','Pagamento efectuado com sucesso, verifique as informações da compra no seu email.');
                } catch (\Exception $th) {
                    //Throwable    throw $th;
                    DB::rollBack();
                    return redirect()->back()->with('error','Algo deu errado no processo, por favor tente novamente');
                }

            }else {
                //return $response->getMessage();
                $request->session()->pull('data',[]);
                
                return redirect()->back()->with('error',$response->getMessage());
            }

        }else {

            $request->session()->pull('data',[]);
            
            return redirect()->back()->with('error','Transação negada!');
        }
    }

    public function error(Request $error){
        //return "Utilizador cancelou o pagamento!";
        $request->session()->pull('data',[]);
        return redirect()->back()->with('error','Transação cancelada!');     
    }

    public function pay_regular_client(Request $request){
        if (empty($request->tariff_id)) {
            return redirect()->back()->with('error','Escolhe uma tarifa para pagar o bilhete');
        }
        
        $request->session()->put('data',[
            'airline_id'=>$request->airline_id,
            'n_ticket'=>$request->n_ticket,
            'tariff_id'=>$request->tariff_id,
            'return_airline_id'=>$request->return_airline_id,
            'return_tariff_id'=>$request->return_tariff_id,
            'n_ticket_return'=>$request->n_ticket_return,
            'route'=>$request->route,
            //Para utilizador normal
            'first_name'=> $request->first_name,
            'last_name'=>$request->last_name,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'category_age'=>$request->category_age,
            'contact'=>$request->contact,
            'birth_date'=>$request->birth_date,
        ]);

        $tariff = Tariff::find($request->tariff_id);
        $tariff2 = Tariff::find($request->return_tariff_id);
        
        try {
            $response = $this->gateway->purchase(array(
                'amount'=>
                    isset($tariff2)?
                    ($tariff->amount*$request->n_ticket)+($tariff2->amount*$request->n_ticket_return)
                    :($tariff->amount*$request->n_ticket),
                
                
                'currency'=>env('PAYPAL_CURRENCY'),
                'returnUrl'=>route('regular_client_success'),
                'cancelUrl'=>url('regular_client_error'),
                //'description'=>'Teste de pagamento',
            ))->send();
            
            if ($response->isSuccessful()) { 
                if ($response->isRedirect()) {
                    
                    $ref = $response->getTransactionReference();
                    return $response->redirect();
                }else{
                    $response->getMessage();
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public function regular_client_success(Request $request){
        $data = $request->session()->get('data');
        //dd($data);
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'=>$request->input('PayerID'),
                'transactionReference'=>$request->input('paymentId'),
            ));

            $response = $transaction->send();
            if ($response->isSuccessful()) { 
                $arr = $response->getData();
                
                DB::beginTransaction();
                try{
                    
                    $user = new User;
                    $user->first_name = $data["first_name"];
                    $user->last_name = $data["last_name"];
                    $user->email = $data["email"];
                    $user->type = "client";
                    $user->contact = $data["contact"];
                    $user->password = '';
                    $user->save();

                    $client = new Client;
                    $client->user_id = $user->id;
                    if ($data["category_age"] == 'old' && $data["gender"] == 'm') {
                        $client->title = 'sr';
                    }else if ($data["category_age"] == 'old' && $data["gender"] == 'f') {
                        $client->title = 'sra';
                    }else{
                        $client->title = 'child';
                    }
                    $client->save();

                    $regular_client = new RegularClient;
                    $regular_client->client_id = $client->id;
                    $regular_client->birthDate = $data["birth_date"];
                    $regular_client->gender = $data["gender"];
                    $regular_client->save();

                    $payment = new Buy;
                    $payment->user_id = $user->id;
                    $payment->type = $data["route"];

                    $payment->reference_code = $request->input('paymentId');
                    //$payment->user_id = auth()->user()->id;
                    //$payment->payment_id = $arr['id'];
                    $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr['payer']['payer_info']['email'];
                    $payment->method = 'paypal';
                    $payment->amount = $arr['transactions'][0]['amount']['total'];
                    $payment->currency = env('PAYPAL_CURRENCY');
                    $payment->status = $arr['state'];
                    $payment->save();               

                    $tariff_airline_ticket = new TariffAirlineTicket;
                    $tariff_airline_ticket->tariff_id = $data["tariff_id"];
                    $tariff_airline_ticket->airline_id = $data["airline_id"];
                    $tariff_airline_ticket->n_ticket = $data["n_ticket"];
                    $tariff_airline_ticket->buy_id = $payment->id;
                    $tariff_airline_ticket->save();

                    if($data["route"] =='goBack'){

                        $tariff_airline_ticket = new TariffAirlineTicket;
                        $tariff_airline_ticket->tariff_id = $data["return_tariff_id"];
                        $tariff_airline_ticket->airline_id = $data["return_airline_id"];
                        $tariff_airline_ticket->n_ticket = $data["n_ticket_return"];
                        $tariff_airline_ticket->buy_id = $payment->id;
                        $tariff_airline_ticket->save();

                    }

                    DB::commit();
                         
                    $request->session()->pull('data',[]);
                    return redirect()->route('home_airlines')->with('success','Pagamento efectuado com sucesso, verifique as informações da compra no seu email.');

                } catch (\Exception $th) {
                    //Throwable    throw $th;
                    DB::rollBack();
                    return redirect()->back()->with('error','Algo deu errado no processo, por favor tente novamente');
                }  
            }else {
                //return $response->getMessage();
                $request->session()->pull('data',[]);
                
                return redirect()->back()->with('error',$response->getMessage());
            }

        }else {

            $request->session()->pull('data',[]);
            return redirect()->back()->with('error','Transação negada!');
        }
    }

    public function regular_client_error(Request $error){
        //return "Utilizador cancelou o pagamento!";
        $request->session()->pull('data',[]);
        return redirect()->back()->with('error','Transação cancelada!');     
    }

    public function proof_payment(Request $request){
        $verif_payment = Payment::where('currency','KZ')->where('status_validate',0)->where('user_id',auth()->user()->id)->first();
        //
        if (isset($verif_payment)) {
            return redirect()->back()->with('error','Comprovativo anterior não foi aprovada! Podes anular e enviar novamente.');
        }
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            
            $requestFile = $request->file;
            $extension = $requestFile->extension();
            //dd($extension);
            if (($extension != "jpg") && ($extension != "png") && ($extension != "pdf")) {
                return redirect()->back()->with('error','Extensão inválida! Extensão válidas (jpg,png e pdf,'.$extension.').');
            }
            $proof = md5($requestFile->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $request->file->move(public_path('user/bank_receipt'), $proof);

            $user_plan = UserPlan::where('user_id',auth()->user()->id)->first();

            $payment = new Payment();
            //$payment->reference_code = $request->input('paymentId');
            $payment->user_id = auth()->user()->id;
            $payment->plan_id = $user_plan->plan_id;
            $payment->method = 'ref';
            $payment->amount = auth()->user()->user_plan->plan->price;
            $payment->currency = 'KZ';
            $payment->status = 'pending';
            $payment->status_validate = 0;
            $satus_1 = $payment->save();
                
            $bank_receipt = new BankReceipt();
            $bank_receipt->file = $proof;
            $bank_receipt->payment_id = $payment->id;
            $satus_2 = $bank_receipt->save();

            $notification=[
                "amount"=>auth()->user()->user_plan->plan->price,
                "currency" => 'KZ',
                "status" => 'pending',
                "title"=>"Pagamento aprovado!",
                "message"=>"Válido até ".auth()->user()->user_plan->plan->days." dias",
                "payment_id" => $payment->id
            ];

            if ($satus_1 && $satus_2) {
                $notification_status = $this->send_message($notification);
                return redirect()->back()->with('success2','Comprovativo de pagamento enviado! Aguarde pela ativação do plano');       
            }elseif (auth()->user()->class == 'fg') {
                return redirect()->back()->with('error','Algo deu errado, comprovativo não foi enviado!');        
            }
        }
    }

    public function send_message($request){
        $admin_message = new AdminSendMessage();
        $admin_message->title = $request["title"];
        $admin_message->message = $request["message"];
        //$admin_message->sell_phone_id = $request->sell_phone_id;
        $admin_message->user_id = auth()->user()->id;
        $admin_message->payment_id = $request["payment_id"];
        $status = $admin_message->save();
        if ($status) {
            $auth = $admin_message->user;
            
            $auth->notify(new NotifyMessage($admin_message));
            return true;
        }else {
            return false;
        }
    }


    /*public function notifications(){
        $notifications = Notification::where('type','App\Notifications\NotifyMessage')->where('read_at',null)->get();
        return view('users.notifications',['notifications'=>$notifications]);
    }

    public function view_notification(Request $request){
        $notification = Notification::find($request->notif_id);
        
        if (isset($notification)) {
            $title = json_decode($notification->data)->adminMessage->title;
            $message = json_decode($notification->data)->adminMessage->message;

            $status_message = StatusMessage::where('user_id',auth()->user()->id)->where('admin_message_id',json_decode($notification->data)->adminMessage->id)->first();
            if (empty($status_message)) {
                $status_message = new StatusMessage();
                $status_message->status = true;
                $status_message->user_id = auth()->user()->id;
                $status_message->admin_message_id = json_decode($notification->data)->adminMessage->id;
                $status_message->save();
            }
            $count = count(Notification::where('type','App\Notifications\NotifyMessage')->where('read_at',null)->get()) - count(StatusMessage::all());
            return response()->json([
                'success' => true,
                'status' => $status_message->status,
                'title' => $title,
                'count' => $count,
                'message' => $message,
            ],200);
        }
        return response()->json([
            'success' => false,
            'message' => "Algo deu errado, nas notificações!",
        ],422);
        
    }*/
}
