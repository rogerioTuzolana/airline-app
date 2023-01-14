
@extends('layouts.member')

@section('title', 'Home')
@section('route', 'Home')

@section('content')

<div class="row">

    <div class="mb-4 mt-4">
        {{--<form action="{{route('home')}}" method="GET">
          <input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
        </form>--}}

        <div class="col-lg-4 col-md-6 col-sm-12 container-search">
          <div class="small fw-light"></div>
          <form action="{{route('home')}}" method="GET">
            @csrf
            <div class="input-group">
              <input class="form-control border-end-0 border rounded-pill" style="height: 40px;margin-left: 20px;" name="search" type="search" placeholder="Pesquisar" id="example-search-input">
              <span class="input-group-append" style="margin-top:-0.5px;">
                <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" style="margin-left: -33px;z-index: 7;padding:5px 10px 10px 10px" type="submit">
                  <i class="bi bi-search" style="{{--margin-left:-5px;--}}"></i>
                </button>
              </span>
            </div>
          </form>
        </div>
    </div>
    <div class="card-group">
      @foreach ($airlines as $airline)
      <div class="card rounded" style="margin-left: 20px">
        <div class="card-header card-personal text-center">{{$airline->name}}</div>
        <div class="card-body">
          <p class="card-title text-center">{{$airline->category}}</p> 
        </div>
        <div class="card-footer">
          <h5 class="text-center" style="color:#012970">Origem</h5>
          <p class="text-center">{{$airline->orige}}</p>
          <h5 class="text-center" style="color:#012970">Destino</h5>
          <p class="text-center">{{$airline->destiny}}</p>
          <button class="btn text-white" style="background: #d8703b" data-airId="{{$airline->id}}" id="btn-buyTicket" >Comprar Bilhete</button>
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


@endsection