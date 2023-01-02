
@extends('layouts.admin')

@section('title', 'Frotas')
@section('route', 'Frotas')

@section('content')

<div class="row">
    <div class="d-flex">
        <div class="col-11"></div>
        <div class="col-1">
            <button class="btn btn-success" style="border-radius: 10px" onclick="modalFleet()"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>
    <div class="row mb-4 mt-4">
        <form action="{{--route('planos')--}}" method="GET">
          <input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
        </form>
    </div>
    <div class="card-group">
      @foreach ($fleets as $fleet)
      <div class="card rounded" style="margin-left: 20px">
        <div class="card-header card-personal text-center">{{$fleet->brand}}</div>
        <div class="card-body">
          <p class="card-title text-center">{{$fleet->model}}</p> 
        </div>
        <div class="card-footer">
          @if ($fleet->capacity!=null)
          <h5 class="text-center" style="color:#012970">Capacidade</h5>
          <p class="text-center">{{$fleet->capacity}}</p>      
          @endif
          <h5 class="text-center" style="color:#012970">Capacidade</h5>
          <p class="text-center">{{$fleet->capacity}}</p>
          <button class="btn text-white" style="background: #d8703b" onclick="modalEditFleet({{$fleet->id}},'{{$fleet->name}}','{{$fleet->description}}','{{$fleet->price}}')">Editar</button>
          <button class="btn text-white bg-danger" onclick="modalDropFleet({{$fleet->id}})">Eliminar</button>
        </div>
      </div>
      @endforeach

      @if (count($fleets) == 0 && $search)
        <div class="row">
          <div class="text-center">
            <p style="font-size: 18px">Nenhuma frota encotrado<a href="{{route('frotas')}}"><b>Ver todos</b></a></p>
          </div>
        </div>
      @endif
    </div>
</div>
<div class="d-flex">
    <div class="align-self-center mx-auto">
        {{--$plans->appends(['search'=>isset($search)?$search:''])->links()--}}
    </div>
</div>

<div class="modal fade" id="exampleModalFleet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Frota</h4>
          </div>
          <div class="text-center alert alert-danger" id="resultBox" style="display: none">
            <a id="result"></a>
          </div>
          <div class="d-flex flex-column text-center">
            <form id="formAddFleet" method="POST" name="formAddFleet">
              @csrf
              <div class="form-group mb-3">
                <input type="text" class="form-control rounded" id="brand" placeholder="Marca" required>
                <div class="invalid-feedback">Marca inválido</div>
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control rounded" id="model" placeholder="Modelo" required>
                <div class="invalid-feedback">Modelo inválido</div>
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control rounded money" id="capacity" placeholder="Capacidade" required>
                <div class="invalid-feedback">Capacidade inválido</div>
              </div>
              <input type="text" class="form-control rounded" id="fleet_id" hidden>
              <div class="row text-center">
                <button type="submit" class="btn btn-block btn-round text-white" style="background: #3bb9d8;" id="btn-addFleet"></button>
              </div>   
            </form>
          </div>
  
        </div>
        <div class="modal-footer d-flex justify-content-center">
            
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModalDropFleet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Confirmar a eliminação da Frota</h4>
          </div>
          {{--<div class="text-center alert alert-danger" id="resultBoxP" style="display: none">
            <a id="resultP"></a>
          </div>--}}
          <div class="d-flex flex-column text-center" style="margin-top: 25px">
            {{--<form id="formDropPlan" method="POST" name="formDropPlan">
              @csrf--}}
              <input type="text" class="form-control rounded" id="drop_fleet_id" hidden>
              <div class="d-flex justify-content-center">
                  <div>
                    <form id="formDropFleet" method="POST" name="formDropFleet">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-block btn-round text-white btn-danger" id="btn-dropPlan">Eliminar</button>
                    </form>
                    </div>
                  <div style="margin-left: 20px">
                    <button class="btn btn-block btn-round text-white" style="background: #d8703b;" id="btn-cancelDropFleet">Cancelar</button>
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