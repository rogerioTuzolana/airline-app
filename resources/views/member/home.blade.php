
@extends('layouts.member')

@section('title', 'Home')
@section('route', 'Home')

@section('content')

<div style="margin-top: 30px">
  <div class="container">
      <form class="main-form" >
          <h3>Encontre Seu VOO</h3>
          <div class="form-row">
              <div class="col-md-12">
                  <div class="row">
                      <input type="text" value="1" name="status_search" hidden>
                      <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-sm-12">
                          <label>Local Origem</label>
                          <input class="form-control" placeholder="local" type="text" name="orige">
                      </div>
                      <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-sm-12">
                          <label>Local Distino</label>
                          <input class="form-control" placeholder="local" type="text" name="destiny">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-sm-12">
                          <label>Data</label>
                          <input class="form-control" placeholder="Alguma" type="date" name="date">
                      </div>
                      <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6">
                          <label>Preço</label>
                          <input class="form-control" placeholder="00.0" type="text" name="amount">
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                  <div style="margin-top: 20px">
                      <button class="btn p-2" id="btn-search">Procurar</button>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>

<div style="margin-top: 30px;">
  <div class="container">
    <div class="row d-flex justify-content-center">
        
        @forelse ($airlines as $airline)
        <div class="card vid-card mb-3 col-xs-6 col-sm-6 col-md-4 col-lg-3" style="margin-left: 20px">
            
            @php
                $city = App\Models\ApiCity::where('key',$airline->orige)->first();
                $city2 = App\Models\ApiCity::where('key',$airline->destiny)->first();
            @endphp
            <div class="item mb-3 mt-3">
                <img class="img-responsive" src="/images/1.jpg" alt="#" width="100%" />
                <h5 class="mt-2">
                    @if ($airline->category == 'local')
                    {{$city->name}} - {{$city2->name}}
                    @else
                        Any
                    @endif
                    
                </h5>
                @if (isset($search->status_search) && isset($airline->tariffs))
                    
                <h6 class="ml-2">Preços da passagem por tarifa</h6>
                @foreach ($airline->tariffs as $air_tariff)
                    <div class="ml-2">
                        <span class="h1" style="font-weight: bold;font-size:15px;">{{$air_tariff->tariff->name}} - {{number_format($air_tariff->tariff->amount,2,',','.')}}</span>
                    </div>
                @endforeach
                    
                @endif
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                    suffered alteration in soe suffk even slightly believable. If y be sure there
                </p>
                @if (isset($city) && isset($city2))
                <a href="{{URL('/membro/comprar-bilhete?orige='.$city->key.'&destiny='.$city2->key)}}" class="btn ml-1 text-white" style="background-color: #ee580f">Comprar bilhete</a>     
                @else
                <a href="{{URL('/membro/comprar-bilhete{{--?orige="'.$city->name.','.$city2->name--}}')}}" class="btn ml-1 text-white" style="background-color: #ee580f">Comprar bilhete</a>  
                @endif
            </div>
        </div>
        @empty
            <div class="">
                <h5 class="text-secondary text-center">Conteúdos não conteúdos</h5>
            </div>
        @endforelse
        
    </div>
  </div>
  
  <div class="d-flex mt-5">
    <div class="align-self-center mx-auto">
        {{
            $airlines->appends([
                'orige'=>isset($serarch->orige)?$serarch->orige:'',
                'destiny'=>isset($serarch->destiny)?$serarch->destiny:'',
                'date'=>isset($serarch->date)?$serarch->date:'',
                'amount'=>isset($serarch->amount)?$amount:'',
            ])->links()
        }}
    </div>
  </div>
</div>

@endsection