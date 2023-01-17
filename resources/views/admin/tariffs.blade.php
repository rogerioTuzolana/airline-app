
@extends('layouts.admin')

@section('title', 'Tarifas')
@section('route', 'Tarifas')

@section('content')

<div class="row">
    <div class="d-flex">
        <div class="col-11"></div>
        <div class="col-1">
            <button class="btn btn-success" style="border-radius: 10px" onclick="modalTariff()"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>
    <div class="row mb-4 mt-4">
        <form action="{{route('tariffs')}}" method="GET">
          <input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
        </form>
    </div>
    <div class="card-group">
      @foreach ($tariffs as $tariff)
      <div class="card rounded" style="margin-left: 20px">
        <div class="card-header card-personal text-center">{{$tariff->name}}</div>
        <div class="card-body">
          <p class="card-title text-center">{{$tariff->category}}</p> 
        </div>
        <div class="card-footer">
          <h5 class="text-center" style="color:#012970">Preço</h5>
          <p class="text-center">{{$tariff->amount}}</p>
          <button class="btn text-white" style="background: #d8703b" onclick="modalEditTariff({{$tariff->id}},'{{$tariff->name}}','{{$tariff->category}}','{{$tariff->amount}}')">Editar</button>
          <button class="btn text-white bg-danger" onclick="modalDropTariff({{$tariff->id}})">Eliminar</button>
        </div>
      </div>
      @endforeach

      @if (count($tariffs) == 0 && $search)
        <div class="row">
          <div class="text-center">
            <p style="font-size: 18px">Nenhuma tarifa encotrada<a href="{{route('tarifas')}}"><b>Ver todos</b></a></p>
          </div>
        </div>
      @endif
    </div>
</div>
<div class="d-flex">
    <div class="align-self-center mx-auto">
        {{$tariffs->appends(['search'=>isset($search)?$search:''])->links()}}
    </div>
</div>

<div class="modal fade" id="exampleModalTariff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Tarifas</h4>
          </div>
          <div class="text-center alert alert-danger" id="resultBox" style="display: none">
            <a id="result"></a>
          </div>
          <div class="d-flex flex-column">
            <form id="formAddTariff" method="POST" name="formAddTariff">
              @csrf
              <div class="form-group mb-3">
                <input type="text" class="form-control rounded" id="name" placeholder="Nome" required>
                <div class="invalid-feedback">Nome inválido</div>
              </div>
              <div class="form-group mb-3">
                <label for="">Classe</label>
                <select type="text" class="form-control rounded" id="category" required>
                  <option value="economic">Económica</option>
                  <option value="executive">Executiva</option>
                </select>
                <div class="invalid-feedback">Categoria inválido</div>
              </div>
              {{--<div class="form-group mb-3">
                <label for="">Regalias</label>
                <select type="text" class="form-control rounded" id="category" required>
                  <option value="">Y</option>
                  <option value="">X</option>
                </select>
                <div class="invalid-feedback">Categoria inválido</div>
              </div>--}}
              <div class="form-group mb-3">
                <input type="text" class="form-control rounded money" id="amount" placeholder="Preço" required>
                <div class="invalid-feedback">Preço inválido</div>
              </div>
              
              <input type="text" class="form-control rounded" id="tariff_id" hidden>
              
              <div class="row text-center">
                <button type="submit" class="btn btn-block btn-round text-white" style="background: #3bb9d8;" id="btn-addTariff"></button>
              </div>
            </form>
          </div>
  
        </div>
        <div class="modal-footer d-flex justify-content-center">
            
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModalDropTariff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Confirmar a eliminação da Tarifa</h4>
          </div>
          {{--<div class="text-center alert alert-danger" id="resultBoxP" style="display: none">
            <a id="resultP"></a>
          </div>--}}
          <div class="d-flex flex-column text-center" style="margin-top: 25px">
            {{--<form id="formDropPlan" method="POST" name="formDropPlan">
              @csrf--}}
              <input type="text" class="form-control rounded" id="drop_tariff_id" hidden>
              <div class="d-flex justify-content-center">
                  <div>
                    <form id="formDropTariff" method="POST" name="formDropTariff">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-block btn-round text-white btn-danger" id="btn-dropTariff">Eliminar</button>
                    </form>
                    </div>
                  <div style="margin-left: 20px">
                    <button class="btn btn-block btn-round text-white" style="background: #d8703b;" id="btn-cancelDropTariff">Cancelar</button>
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