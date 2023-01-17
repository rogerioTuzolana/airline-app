
@extends('layouts.admin')

@section('title', 'Voos')
@section('route', 'Voos')

@section('content')

<div class="row">
    <div class="d-flex">
        <div class="col-11"></div>
        <div class="col-1">
            <button class="btn btn-success" style="border-radius: 10px" onclick="modalAirline()"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>
    <div class="row mb-4 mt-4">
        <form action="{{--route('planos')--}}" method="GET">
          <input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
        </form>
    </div>
    <div class="card-group">
      @foreach ($airlines as $airline)
      <div class="card rounded" style="margin-left: 20px">
        <div class="card-header card-personal text-center">{{$airline->name}}</div>
        <div class="card-body">
          <div class="row mt-2">
          @foreach ($tariffs as $tariff)
          @php
              $tariff_airline = App\Models\TariffAirline::where('tariff_id',$tariff->id)->where('airline_id',$airline->id)->first();
              //dd($perk_tariff);
          @endphp
          <div class="col-6"><a class="card-title text-center">{{$tariff->name}}</a></div>
          <div class="col-6 mb-2">
            <div class="row">
              <div class="col-3 form-check form-switch">
                <input class="form-check-input checkTariffAir" type="checkbox" id="flexSwitchCheckDefault" data-tariff_air="{{isset($tariff_airline->id)?$tariff_airline->id:''}}" data-tariff="{{$tariff->id}}" data-airline="{{$airline->id}}" @if (isset($tariff_airline) && $tariff_airline->status)checked @endif>
                {{--<label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>--}}
              </div>
            </div>
          </div>
          <hr>         
          @endforeach
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <h1 class="text-center" style="font-size: 25px">Percurso</h1>
          </div>
          <div class="row">
            <div class="col-6">
              <h1 class="text-center" style="font-size: 20px">{{$airline->orige}}</h1>
            </div>
            <div class="col-6">
              <h1 class="text-center" style="font-size: 20px">{{$airline->destiny}}</h1>
            </div>
          
          </div>
          
          <button class="btn text-white" style="background: #378f9b" onclick="modalEditAirline({{$airline->id}},'{{$airline->name}}','{{$airline->orige}}','{{$airline->destiny}}','{{$airline->date}}','{{$airline->time}}','{{$airline->category}}')">Editar</button>
          <button class="btn text-white bg-danger" onclick="modalDropAirline({{$airline->id}})">Eliminar</button>
        </div>
      </div>
      @endforeach
    </div>
    @if (count($airlines) == 0 && $search)
      <div class="row">
        <div class="text-center">
          <p style="font-size: 18px">Nenhum voo encotrado<a href="{{route('voos')}}"><b>Ver todos</b></a></p>
        </div>
      </div>
    @endif
</div>
<div class="d-flex">
    <div class="align-self-center mx-auto">
        {{$airlines->appends(['search'=>isset($search)?$search:''])->links()}}
    </div>
</div>

<div class="modal fade" id="exampleModalAirline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Voo</h4>
        </div>
        <div class="text-center alert alert-danger" id="resultBox" style="display: none">
          <a id="result"></a>
        </div>
        <div class="d-flex flex-column">
          <form id="formAddAirline" method="POST" name="formAddAirline">
            @csrf
            <div class="form-group mb-3">
              <label for=""></label>
              <input type="name" class="form-control rounded" id="name" placeholder="Nome" required>
              <div class="invalid-feedback">Percurso inválido</div>
            </div>

            <div class="form-group mb-3">
              <label for="">Categoria do voo</label>
              <select name="category" id="category" class="form-control rounded" onchange="changeCategory(this)">
                <option value="local">Doméstico</option>
                <option value="inter">Internacional</option>
              </select>
              <div class="invalid-feedback">Percurso inválido</div>
            </div>
            <div class="row mt-3" id="optionLocal">
              <div class="col-6">
                <div class="form-group mb-3">
                  <label for="">Origem</label>
                  <select name="orige" id="orige" class="form-control rounded">
                    <option value="bengo">Bengo</option>
                    <option value="bengue">Benguela</option>
                    <option value="bie">Bié</option>
                    <option value="cabinda">Cabinda</option>
                    <option value="cuandocub">Cuando-Cubango</option>
                    <option value="cunene">Cunene</option>
                    <option value="huambo">Huambo</option>
                    <option value="huila">Huíla</option>
                    <option value="kwanzano">Kwanza Norte</option>
                    <option value="luanda">Luanda</option>
                    <option value="Lundano">Lunda Norte</option>
                    <option value="Lundasu"> Lunda Sul</option>
                    <option value="malanje">Malanje</option>
                    <option value="moxico">Moxico</option>
                    <option value="Namibe">Namibe</option>
                    <option value="uige">Uíge</option>
                    <option value="zaire">Zaire</option>
                  </select>
                  <div class="invalid-feedback">Percurso inválido</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group mb-3">
                  <label for="">Destino</label>
                  <select name="destiny" id="destiny" class="form-control rounded" required>
                    <option value="bengo">Bengo</option>
                    <option value="bengue">Bengue</option>
                    <option value="bie">Bié</option>
                    <option value="cabinda">Cabinda</option>
                    <option value="cuandocub">Cuando-Cubango</option>
                    <option value="cunene">Cunene</option>
                    <option value="huambo">Huambo</option>
                    <option value="huila">Huíla</option>
                    <option value="kwanzano">Kwanza Norte</option>
                    <option value="luanda">Luanda</option>
                    <option value="Lundano">Lunda Norte</option>
                    <option value="Lundasu"> Lunda Sul</option>
                    <option value="malanje">Malanje</option>
                    <option value="moxico">Moxico</option>
                    <option value="Namibe">Namibe</option>
                    <option value="uige">Uíge</option>
                    <option value="zaire">Zaire</option>
                  </select>
                  <div class="invalid-feedback">Percurso inválido</div>
                </div>
              </div>
            </div>

            <div class="row mt-3" id="optionInter">
              <div class="col-6">
                <div class="form-group mb-3">
                  <label for="">Origem</label>
                  <select name="orige2" id="orige2" class="form-control rounded">
                    <option value="angolan">Angola</option>
                    <option value="portugal">Portugal</option>
                    <option value="brasil">Brasil</option>
                  </select>
                  <div class="invalid-feedback">Percurso inválido</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group mb-3">
                  <label for="">Destino</label>
                  <select name="destiny2" id="destiny2" class="form-control rounded" required>
                    <option value="angolan">Angola</option>
                    <option value="portugal">Portugal</option>
                    <option value="brasil">Brasil</option>
                  </select>
                  <div class="invalid-feedback">Percurso inválido</div>
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="">Frota</label>
              <select name="fleet_id" id="fleet_id" class="form-control rounded">
                @foreach ($fleets as $fleet)
                <option value="{{$fleet->id}}">{{$fleet->brand}}</option>
                @endforeach
                
              </select>
              <div class="invalid-feedback">Percurso inválido</div>
            </div>

            <div class="form-group mb-3">
              <label for="">Data do voo</label>
              <input type="date" class="form-control rounded" id="date" placeholder="" required>
              <div class="invalid-feedback">Percurso inválido</div>
            </div>
            <div class="form-group mb-3">
              <label for="">Hora do voo</label>
              <input type="time" class="form-control rounded" id="time" placeholder="" required>
              <div class="invalid-feedback">Percurso inválido</div>
            </div>
        
            <input type="text" class="form-control rounded" id="airline_id" hidden>
            
            <div class="row text-center">
              <button type="submit" class="btn btn-block btn-round text-white" style="background: #3bb9d8;" id="btn-addAirline"></button>
            </div>

          </form>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
          
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalInfoPerkTariff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-lg modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h5 id="title-tariff-perk2" style="font-weight: bold"></h5>
        </div>

        <div class="d-flex flex-column">
          <p id="description2" class="mb-2" style="text-align: center">
          </p>
        </div>

      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalPerk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Regalias</h4>
          </div>
          <div class="text-center alert alert-danger" id="resultBox" style="display: none">
            <a id="result"></a>
          </div>
          <div class="d-flex flex-column">
            <form id="formAddPerk" method="POST" name="formAddPerk">
              @csrf
              <div class="form-group mb-3">
                <input type="text" class="form-control rounded" id="name" placeholder="Nome" required>
                <div class="invalid-feedback">Nome inválido</div>
              </div>
              {{--<div class="form-group mb-3">
                <label for="">Tipo</label>
                <input type="text" class="form-control rounded" id="type" placeholder="Para tipo de tarifas" required>
                <div class="invalid-feedback">Tipo inválido</div>
              </div>--}}
              <div class="form-group mb-3">
                <label for="">Descrição</label>
                <textarea name="description" class="form-control rounded" id="description" placeholder="Descrição" cols="30" rows="3">
                </textarea>
                <div class="invalid-feedback">Descrição inválido</div>
              </div>
              {{--<div class="form-group mb-3">
                <label for="">Descrição para classe executiva</label>
                <textarea name="description" class="form-control rounded" id="description" placeholder="Descrição" cols="30" rows="3">
                </textarea>
                <div class="invalid-feedback">Descrição inválido</div>
              </div>--}}
              <input type="text" class="form-control rounded" id="perk_id" hidden>
              
              <div class="row text-center">
                <button type="submit" class="btn btn-block btn-round text-white" style="background: #3bb9d8;" id="btn-addPerk"></button>
              </div>

            </form>
          </div>
  
        </div>
        <div class="modal-footer d-flex justify-content-center">
            
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModalDropPerk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Confirmar a eliminação da Regalia</h4>
          </div>
          {{--<div class="text-center alert alert-danger" id="resultBoxP" style="display: none">
            <a id="resultP"></a>
          </div>--}}
          <div class="d-flex flex-column text-center" style="margin-top: 25px">
            {{--<form id="formDropPlan" method="POST" name="formDropPlan">
              @csrf--}}
              <input type="text" class="form-control rounded" id="drop_perk_id" hidden>
              <div class="d-flex justify-content-center">
                  <div>
                    <form id="formDropPerk" method="POST" name="formDropPerk">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-block btn-round text-white btn-danger" id="btn-dropPerk">Eliminar</button>
                    </form>
                    </div>
                  <div style="margin-left: 20px">
                    <button class="btn btn-block btn-round text-white" style="background: #d8703b;" id="btn-cancelDropPerk">Cancelar</button>
                  </div>
              </div>          
            {{--</form>--}}
          </div>
  
        </div>
        {{--<div class="modal-footer d-flex justify-content-center">
            
        </div>--}}
      </div>
    </div>
</div>
@endsection