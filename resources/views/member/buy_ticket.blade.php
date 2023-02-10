
@extends('layouts.member')

@section('title', 'Home')
@section('route', 'Home')

@section('content')

<div class="row">
  <div class="col-lg-8 col-md-6">
    <form method="GET" action="{{route('pagar-bilhete')}}" id="infob">
      @csrf
      <input type="text" value="{{Auth::user()->id}}{{--Auth::user()->client->member->--}}" hidden>

      <div class="form-row mt-2">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <label for="nbilhete">Quantidade de Bilhete</label>
            <input type="text" id="n_ticket" class="form-control rounded ticket_quantity" name="n_ticket" required>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <label for="date">Data de Partida</label>
            <select class="form-control rounded" id="date" name="date" required>
              <option value=""></option>
              @foreach ($date as $dte)
                  <option value="{{$dte->id}}" id="date-val{{$dte->id}}" data-date="{{$dte->date.' '.$dte->time}}">{{$dte->date.' '.$dte->time}}{{--.' - '.$dte->name--}}</option>
              @endforeach
            </select>
          </div> 
        </div>
      </div>

      <div class="form-row mt-2">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" {{--onclick="goAndGoBack(this)"--}} name="route" id="route1" value="go" >
                <label class="form-check-label" for="route1" >Ida</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input chooseDateReturn" {{--onclick="goAndGoBack(this)"--}} type="radio" name="route" id="route2"
                  value="goBack">
              <label class="form-check-label" for="route2">Ida e Volta</label>
            </div>
          </div>
        </div>
      </div>

      <div class="form-row" id="div-date-return">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <label for="data_return">Data de Regresso</label>
            <select class="form-control rounded" id="date_return" name="date_return" required>
              <option value=""></option>
              @foreach ($date_return as $date)
                  <option value="{{$dte->id}}" id="date_return-val{{$dte->id}}" data-date_return="{{$date->date.' '.$date->time}}">{{$date->date.' '.$date->time.' - '.$date->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> 
            <label for="nbilhete">Quantidade de bilhete de volta</label>
            <input type="text" id="n_ticket_return" class="form-control rounded ticket_quantity" name="n_ticket_return"> 
            
          </div>
        </div>
      </div>

      <div class="form-group justify-content-center mt-3">
        <div class="col-12 mx-auto" style="width: 200px;">
          <button type="submit" class="btn btn-primary btn-lg" id="btnBuyTicket">Comprar Bilhete</button>
        </div>
      </div>
    </form>
  </div>

  <div class="col-lg-4 col-md-6 bg-primary mt-3">
    <div class="text-center mt-3">
      <h1 class="text-white" style="font-weight: bold;font-size: 20px">Dados da Viagem</h1>
    </div>
    <div class="text-center mt-2">
      <a class="h6 text-light">Percurso</a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col"><a class="text-light">Origem</a></th>
          <th scope="col"><a class="text-light">Destino</a></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td >
            <span style="font-size: 16px;color:#fff;">{{$city->name}}</span>
          </td>
          <td>
            <span style="font-size: 16px;color:#fff;">{{$city2->name}}</span>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="text-center mt-2">
      <a class="h6 text-light">Datas</a>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col"><a class="text-light">Data de partida</a></th>
          <th scope="col"><a class="text-light">Data de regresso</a></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td >
            <span style="font-weight: bold;font-size: 16px;color:#fff;" id="date2"></span>
          </td>
          <td>
            <span style="font-weight: bold;font-size: 16px;color:#fff;" id="date_return2">--</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
{{--<div class="row">

    <div class="mb-4 mt-4">

sm-12 container-search">
          <div class="small fw-light"></div>
          <form action="{{route('home')}}" method="GET">
            @csrf
            <div class="input-group">
              <input class="form-control border-end-0 border rounded-pill" style="height: 40px;margin-left: 20px;" name="search" type="search" placeholder="Pesquisar" id="example-search-input">
              <span class="input-group-append" style="margin-top:-0.5px;">
                <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" style="margin-left: -33px;z-index: 7;padding:5px 10px 10px 10px" type="submit">
                  <i class="bi bi-search" style=""></i>
                </button>
              </span>
            </div>
          </form>
        </div>
    </div>
    <div class="card-group">
      @foreach ($airlines as $airline)
      @php
          $orige = App\Models\ApiCity::where('key',$airline->orige)->first();
          $destiny = App\Models\ApiCity::where('key',$airline->destiny)->first();
      @endphp
      <div class="card rounded" style="margin-left: 20px">
        <div class="card-header card-personal text-center">{{$airline->name}}</div>
        <div class="card-body">
          <p class="card-title text-center">{{($airline->category=='local')?'Voo Local':'Voo Internacional'}}</p> 
        </div>
        <div class="card-footer">
          <h5 class="text-center" style="color:#012970">Origem</h5>
          <p class="text-center">{{$orige->name}}</p>
          <h5 class="text-center" style="color:#012970">Destino</h5>
          <p class="text-center">{{$destiny->name}}</p>
          <button class="btn text-white" style="background: #d8703b" onclick="modalBuyTicket()" data-airId="{{$airline->id}}" id="btn-buyTicket" >Comprar Bilhete</button>
        </div>
      </div>
      @endforeach

      @if (count($airlines) == 0 && $search)
        <div class="row">
          <div class="text-center">
            <p style="font-size: 18px">Nenhuma frota encotrado<a href="{{route('home')}}"><b>Ver todos</b></a></p>
          </div>
        </div>
      @endif
    </div>
</div>
<div class="d-flex">
    <div class="align-self-center mx-auto">
        {{$airlines->appends(['search'=>isset($search)?$search:''])->links()}}
    </div>
</div>
--}}

@endsection