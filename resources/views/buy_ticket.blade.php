
@extends('layouts.main')

@section('title', 'PDC Airline - Comprar Bilhete')

@section('content')

  
  <form method="GET" action="{{route('pagarbilhete')}}" id="infob">
    @csrf
    <input type="text" value="" hidden>
    <div class="form-row mt-3">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <label for="name">Nome</label>
          <input type="text" class="form-control rounded" name="name" id="name" value="" placeholder="">
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-11">
          <label for="lastname">Sobrenome</label>
          <input type="text" class="form-control rounded" name="lastname" id="lastname"
              placeholder="">
        </div>
      
    </div>
    <div class="form-row mt-2">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="category_age" id="inlineRadio1"
              value="old">
          <label class="form-check-label" for="inlineRadio1">Adulto</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="category_age" id="inlineRadio2"
                value="child">
            <label class="form-check-label" for="inlineRadio2">Criança</label>
        </div>
      </div>
    </div>
    <div class="form-row mt-2">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <label for="genero">Genero</label>
          <select class="form-control">
              <option selected>selecionar</option>
              <option>Masculino</option>
              <option>Feminino</option>
          </select>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <label>Data Nascimento</label>
            <input class="form-control" placeholder="birth_date" type="date" name="Alguma">
        </div>
      
    </div>

    <div class="form-row mt-2">
      
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <label for="email">E-mail</label>
            <input type="email" class="form-control rounded" name="email" id="email"
                placeholder="" value="" required>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <label for="email">Telefone</label>
            <input type="text" class="form-control rounded" name="tel" id="tel"
                placeholder="" value="" required>
        </div>

    </div>
    <input type="text" id="category" name="category" hidden>

    <div class="form-row mt-2">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="cat1" onclick="typeAirline(this)" name="cat" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1" >Doméstico</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" id="cat2" onclick="typeAirline(this)" type="radio" name="cat" id="inlineRadio2"
                value="option2">
            <label class="form-check-label" for="inlineRadio2">Internacional</label>
          </div>
        </div>
      
    </div>

    <div class="form-row mt-2" id="loca">
      
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
          <label for="origem">Aeroporto Origem</label>
          @php
              $citys = App\Models\ApiCity::get();
          @endphp
          <select class="form-control chooseDate" name="orige" id="orige" data-per="orig" >
            <option>selecionar</option>
            @foreach ($citys as $city)
            <option value="{{$city->key}}">{{$city->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
          <label for="destiny">Aeroporto Destino</label>
          @php
              $citys = App\Models\ApiCity::get();
          @endphp
          <select class="form-control chooseDate" name="destiny" id="destiny" data-per="des" >
            <option >selecionar</option>
            @foreach ($citys as $city)
            <option value="{{$city->key}}">{{$city->name}}</option>
            @endforeach
          </select>
       
        </div>
      
    </div>
    <div class="form-row mt-2" id="intern">
     
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <label for="origem">Aeroporto Origem</label>
          <select class="form-control chooseDate" id="optionInter1" name="optionInter1" >

          </select>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <label for="distino">Aeroporto Destino</label>
          <select class="form-control chooseDate" id="optionInter2" name="optionInter2" >
          </select>
        </div>
      
    </div>

    <div class="form-row mt-2">
      
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <label for="nbilhete">Quantidade de Bilhete</label>
          <input type="text" id="n_ticket" class="form-control rounded ticket_quantity" name="n_ticket" required>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <label for="date">Data de Partida</label>
          <select class="form-control rounded" id="date" name="date">
          </select>
        </div>
      
    </div>

    <div class="form-row mt-2">
   
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
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

    <div class="form-row" id="div-date-return">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <label for="data_return">Data de Regresso</label>
          <select class="form-control rounded" id="date_return" name="date_return">  
          </select>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12"> 
          <label for="nbilhete">Quantidade de bilhete de volta</label>
          <input type="text" id="n_ticket_return" class="form-control rounded ticket_quantity" name="n_ticket_return"> 
          
        </div>
    </div>

    <div class="form-group justify-content-center mt-3">
      <div class="col-12 mx-auto" style="width: 200px;">
      <button type="submit" class="btn btn-primary btn-lg" id="btnBuyTicket">Comprar Bilhete</button>
    </div>
  </div>
  </form>



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