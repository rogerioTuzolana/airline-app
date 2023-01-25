<?php

namespace App\Http\Controllers;


use App\Models\BuyTicket;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Omnipay\Common\Exception\OmnipayException;
use Omnipay\Omnipay;


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
        
        $request->session()->put('data',[
            'airline_id'=>$request->airline_id,
            //'email'=>$request->email,
            //'tel'=>$request->tel,
            'n_ticket'=>$request->n_ticket,
            'tariff_id'=>$request->tariff_id,
            'return_airline_id'=>$request->return_airline_id,
            'return_tariff_id'=>$request->return_tariff_id,
        ]);

        $tariff = Tariff::find($request->tariff_id);
        //dd($tariff);
        /*$request->email
        $request->n_ticket
        $request->tel
        $request->n_ticket_return
        $request->date_return*/
        try {
            $response = $this->gateway->purchase(array(
                'amount'=>($tariff->amount*$request->n_ticket),
                'currency'=>env('PAYPAL_CURRENCY'),
                'returnUrl'=>route('success'),
                'cancelUrl'=>url('error'),
                //'description'=>'Teste de pagamento',
            ))->send();
            
            if ($response->isSuccessful()) { 
                if ($response->isRedirect()) {
                    echo "uuu";
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
                

                $payment = new BuyTicket();
                $payment->user_id = auth()->user()->id;
                $payment->tariff_id = $data["tariff_id"];
                $payment->airline_id = $data["airline_id"];
                $payment->n_ticket = $data["n_ticket"];
                $payment->type = 'go';

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
                
                
                $request->session()->pull('data',[]);
                return redirect()->back()->with('success','Pagamento efectuado com sucesso');
                
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
