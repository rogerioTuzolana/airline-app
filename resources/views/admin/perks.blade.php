
@extends('layouts.admin')

@section('title', 'Regalias')
@section('route', 'Regalias')

@section('content')

<div class="row">
    <div class="d-flex">
        <div class="col-11"></div>
        <div class="col-1">
            <button class="btn btn-success" style="border-radius: 10px" onclick="modalPerk()"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>
    <div class="row mb-4 mt-4">
<<<<<<< HEAD
        <form action="{{route('perks')}}" method="GET">
=======
        <form action="{{--route('planos')--}}" method="GET">
>>>>>>> c882d6a9b117e2c9d620b31fa54cebc11b646691
          <input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
        </form>
    </div>
    <div class="card-group">
      @foreach ($perks as $perk)
      <div class="card rounded" style="margin-left: 20px">
        <div class="card-header card-personal text-center">{{$perk->name}}</div>
        <div class="card-body">
          <div class="row mt-2">
          @foreach ($tariffs as $tariff)
          @php
              $perk_tariff = App\Models\PerkTariff::where('perk_id',$perk->id)->where('tariff_id',$tariff->id)->first();
              //dd($perk_tariff);
              
          @endphp
          <div class="col-6"><a class="card-title text-center">{{$tariff->name}}</a></div>
          <div class="col-6 mb-2">
<<<<<<< HEAD
            <div class="row">
              <div class="col-3 form-check form-switch">
                <input class="form-check-input checkPerk" type="checkbox" id="flexSwitchCheckDefault" data-perk_tariff="{{isset($perk_tariff->id)?$perk_tariff->id:''}}" data-tariff="{{$tariff->id}}" data-perk="{{$perk->id}}" @if (isset($perk_tariff) && $perk_tariff->status)checked @endif>
                {{--<label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>--}}
              </div>
              @if (isset($perk_tariff) && $perk_tariff->status)
                
                <div class="col-3">
                  @if (isset($perk_tariff->description))
                  <a 
                  onclick="modalEditPerkTariff(
                    {{$perk_tariff->id}},
                    '{{$perk_tariff->description}}',
                    '{{$tariff->name}}',
                    '{{$perk->name}}',
                    {{$perk_tariff->amount}})"
                  class="btn" style="padding: 0px"><i class="bi bi-pencil-square"></i></a>
                  @else
                    @if (isset($perk_tariff->id) && $perk_tariff->status == true)
                    <a 
                    onclick="modalPerkTariff(
                      {{$perk_tariff->id}},
                      '{{$tariff->name}}',
                      '{{$perk->name}}')"
                    class="btn" style="padding: 0px"><i class="bi bi-pencil-square"></i></a>
                    @endif
                  @endif
                </div>
                <div class="col-3">
                  @if ($perk_tariff->description!='')
                  <a 
                  onclick="modalInfoPerkTariff(
                    '{{$perk_tariff->description}}',
                    '{{$tariff->name}}',
                    '{{$perk->name}}')"
                    class="btn" style="padding: 0px;border-radius: 20px"><i class="bi bi-info-circle-fill"></i></a>
                  @else 
                  <a style="padding: 0px;border-radius: 20px" class="btn" style="border-radius: 20px"><i class="bi bi-info-circle-fill"></i></a>
                  @endif
                </div>
              @endif
            </div>
=======
            @if (isset($perk_tariff))
            
            <button 
            onclick="modalEditPerkTariff(
              {{$perk_tariff->id}},
              {{$perk_tariff->tariff_id}},
              {{$perk_tariff->perk_id}},
              '{{$perk_tariff->description}}',
              '{{$tariff->name}}',
              '{{$perk->name}}',
              {{$perk_tariff->amount}})"
              class="btn btn-primary" style="border-radius: 20px">Editar</button>
            @else 
            <button onclick="modalPerkTariff({{$perk->id}},{{$tariff->id}},'{{$tariff->name}}','{{$perk->name}}')" class="btn btn-primary" style="border-radius: 20px">Definir</button>
            @endif
>>>>>>> c882d6a9b117e2c9d620b31fa54cebc11b646691
          </div>
          <hr>         
          @endforeach
          </div>
        </div>
        <div class="card-footer">
          <p class="text-center">{{$perk->description}}</p>
<<<<<<< HEAD
          
          <button class="btn text-white" style="background: #378f9b" onclick="modalEditPerk({{$perk->id}},'{{$perk->name}}','{{$perk->description}}','{{$perk->price}}')">Editar</button>
=======
          <button class="btn text-white" style="background: #d8703b" onclick="modalEditPerk({{$perk->id}},'{{$perk->name}}','{{$perk->description}}','{{$perk->price}}')">Editar</button>
>>>>>>> c882d6a9b117e2c9d620b31fa54cebc11b646691
          <button class="btn text-white bg-danger" onclick="modalDropPerk({{$perk->id}})">Eliminar</button>
        </div>
      </div>
      @endforeach

      @if (count($perks) == 0 && $search)
        <div class="row">
          <div class="text-center">
            <p style="font-size: 18px">Nenhuma regalia encotrada<a href="{{route('regalias')}}"><b>Ver todos</b></a></p>
          </div>
        </div>
      @endif
    </div>
</div>
<div class="d-flex">
    <div class="align-self-center mx-auto">
<<<<<<< HEAD
        {{$perks->appends(['search'=>isset($search)?$search:''])->links()}}
=======
        {{--$perks->appends(['search'=>isset($search)?$search:''])->links()--}}
>>>>>>> c882d6a9b117e2c9d620b31fa54cebc11b646691
    </div>
</div>

<div class="modal fade" id="exampleModalPerkTariff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-lg modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h5 id="title-tariff-perk"></h5>
        </div>
        <div class="text-center alert alert-danger" id="resultBox" style="display: none">
          <a id="result"></a>
        </div>
        <div class="d-flex flex-column">
          <form id="formAddPerkTariff" method="POST" name="formAddPerkTariff">
            @csrf
            {{--<div class="form-group mb-3">
              <label for="">Tipo</label>
              <input type="text" class="form-control rounded" id="type" placeholder="Para tipo de tarifas" required>
              <div class="invalid-feedback">Tipo inválido</div>
            </div>--}}
            <div class="form-group mb-3">
              <label for=""></label>
              <textarea name="description" class="form-control rounded" id="description" placeholder="Descrição" cols="30" rows="3">
              </textarea>
              <div class="invalid-feedback">Descrição inválido</div>
            </div>
<<<<<<< HEAD
            
            <input type="text" class="form-control rounded" id="perk_tariff_id" hidden>
=======
            {{--<div class="form-group mb-3">
              <label for="">Descrição para classe executiva</label>
              <textarea name="description" class="form-control rounded" id="description" placeholder="Descrição" cols="30" rows="3">
              </textarea>
              <div class="invalid-feedback">Descrição inválido</div>
            </div>--}}
            <input type="text" class="form-control rounded" id="perk_id" hidden>
            <input type="text" class="form-control rounded" id="tariff_id" hidden>
>>>>>>> c882d6a9b117e2c9d620b31fa54cebc11b646691
            
            <div class="row text-center">
              <button type="submit" class="btn btn-block btn-round text-white" style="background: #3bb9d8;" id="btn-addPerkTariff"></button>
            </div>

          </form>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
          
      </div>
    </div>
  </div>
</div>

<<<<<<< HEAD
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

=======
>>>>>>> c882d6a9b117e2c9d620b31fa54cebc11b646691
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