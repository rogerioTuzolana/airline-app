
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
        <form action="{{--route('planos')--}}" method="GET">
          <input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
        </form>
    </div>
    <div class="card-group">
      {{--@foreach ($plans as $plan)
      <div class="card rounded" style="margin-left: 20px">
        <div class="card-header card-personal text-center">{{$plan->name}}</div>
        <div class="card-body">
          <p class="card-title text-center">{{$plan->description}}</p> 
        </div>
        <div class="card-footer">
          @if ($plan->quantity_total!=null)     
          <h5 class="text-center" style="color:#012970">Quantidade máxima de telemóveis</h5>
          <p class="text-center">{{$plan->quantity_total}}</p>      
          @endif
          <h5 class="text-center" style="color:#012970">Preço</h5>
          <p class="text-center">{{$plan->price}}</p>
          <button class="btn text-white" style="background: #d8703b" onclick="modalEditPerk({{$plan->id}},'{{$plan->name}}','{{$plan->description}}','{{$plan->price}}')">Editar</button>
          <button class="btn text-white bg-danger" onclick="modalDropPerk({{$plan->id}})">Eliminar</button>
        </div>
      </div>
      @endforeach--}}

      {{--@if (count($plans) == 0 && $search)
        <div class="row">
          <div class="text-center">
            <p style="font-size: 18px">Nenhum plano encotrado<a href="{{route('planos')}}"><b>Ver todos</b></a></p>
          </div>
        </div>
      @endif--}}
    </div>
</div>
<div class="d-flex">
    <div class="align-self-center mx-auto">
        {{--$plans->appends(['search'=>isset($search)?$search:''])->links()--}}
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
            <form id="formAddTariff" method="POST" name="formAddPerk">
              @csrf
              <div class="form-group mb-3">
                <input type="text" class="form-control rounded" id="name" placeholder="Nome" required>
                <div class="invalid-feedback">Nome inválido</div>
              </div>
              <div class="form-group mb-3">
                <label for="">Tipo</label>
                <input type="text" class="form-control rounded" id="type" placeholder="Para tipo de tarifas" required>
                <div class="invalid-feedback">Tipo inválido</div>
              </div>
              <div class="form-group mb-3">
                <label for="">Descrição para classe económica</label>
                <textarea name="description" class="form-control rounded" id="description" placeholder="Descrição" cols="30" rows="3">
                </textarea>
                <div class="invalid-feedback">Descrição inválido</div>
              </div>
              <div class="form-group mb-3">
                <label for="">Descrição para classe executiva</label>
                <textarea name="description" class="form-control rounded" id="description" placeholder="Descrição" cols="30" rows="3">
                </textarea>
                <div class="invalid-feedback">Descrição inválido</div>
              </div>
              <input type="text" class="form-control rounded" id="tariff_id" hidden>
              
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