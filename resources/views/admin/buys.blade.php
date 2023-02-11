
@extends('layouts.admin')

@section('title', 'PDC Airline Admin - Compras de Bilhetes')
@section('route', 'Compras-Bilhetes')

@section('content')

<div class="row mt-4 table-responsive">

    <table class="table table-striped table-hover" id="myTabl" style="font-size: 14px">
        <div class="row mb-3">
            <form action="{{route('minhas-compras')}}" method="GET">
                <input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
            </form>
        </div>
        <thead style="color: #012970">
        <tr>
            <th scope="col">Referência</th>
            <th scope="col">Pay.Id Utilizador</th>
            <th scope="col">Email Pagamento</th>
            <th scope="col">Email Utiliz.</th>
            <th scope="col">Nome</th>
            <th scope="col">Método de Pagamento</th>
            <th scope="col">Valor</th>
            <th scope="col">Tarifas</th>   
            <th scope="col">Voos</th>  
            <th scope="col">Rota</th>  
            <th scope="col">Validação</th>
            <th scope="col">Estado</th>
            <th scope="col">Data</th>
            
        </tr>
        </thead>
        <tbody class="text-secondary" id="myTable">
        @foreach ($buy_tickets as $buy_ticket)
        {{--@php
            $bank_receipt = App\Models\BankReceipt::where('payment_id',$payment->id)->first();
        @endphp--}}

        <tr>
            <td>{{$buy_ticket->reference_code??""}}</td>
            <td>{{$buy_ticket->payer_id??""}}</td>
            <td>{{$buy_ticket->payer_email??""}}</td>
            <td>{{$buy_ticket->user->email??""}}</td>
            <td>
                {{$buy_ticket->user->first_name}} {{$buy_ticket->user->last_name}}
            </td>
            <td>
                {{$buy_ticket->method}}
            </td>
            <td>{{number_format($buy_ticket->amount,2,',','.')." USD"}}</td>
            <td>
                @foreach ($buy_ticket->tariff_airline_tickets as $tariff_airline_ticket)			
                <div class="row">
                    <span class="text-secondary" style="font-weight: bold">
                        {{$tariff_airline_ticket->tariff->name}}
                    </span>
                </div>
                @endforeach
            </td>
            <td>
                @foreach ($buy_ticket->tariff_airline_tickets as $tariff_airline_ticket)			
                <div class="row">
                    <span class="text-secondary" style="font-weight: bold">
                        {{$tariff_airline_ticket->airline->name}}
                    </span>
                </div>
                @endforeach
            </td>
            <td>
                @if ($buy_ticket->route == 'go')
                    Ida
                @else
                    Ida & Volta
                @endif
            </td>
            <td>{{$buy_ticket->status??""}}</td>
            <td>
                @if ($buy_ticket->status_validate==1)
                   <a class="text-white bg-success" style="padding: 3px">Activo</a>   
                @else
                    @if($buy_ticket->status_validate==0 && $buy_ticket->status == 'approved')
                    <a class="text-white bg-warning" style="padding: 3px">Cancelado</a> 
                    @endif
                
                @endif
            <td>{{$buy_ticket->created_at}}</td>
            {{--@if ($currency=='KZ')
            <td>
                <a class="btn btn-primary" href="{{asset('public/')}}/user/bank_receipt/{{$bank_receipt->file}}" target="_blank">Abrir</a>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle text-white" style="background-color: #070c1de5;border-color: #070c1de5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Opção
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @cannot('is_edit')
                        @if($payment->status_validate==0 && $payment->status == 'approved')
                        @else
                        <li><a class="dropdown-item payment_status" data-paymentId="{{$payment->id}}" data-status="{{$payment->status_validate}}" data-userId="{{$payment->user_id}}" href="#">{{($payment->status_validate == 1)?'Desativar':'Ativar'}}</a></li>
                        @endif
                        @endcannot
                    </ul>
                </div>
            </td>
            @endif--}}
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        <div class="align-self-center mx-auto">
            {{$buy_tickets->appends(['search'=>isset($search)?$search:''])->links()}}
        </div>
    </div>
</div>
    
@endsection