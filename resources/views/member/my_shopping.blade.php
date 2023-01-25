@extends('layouts.member')

@section('title', 'PDC Airline - Minhas Compras')
@section('route', 'Minhas-Compras')

@section('content')

	<div class="row mb-4 mt-4">
		<div class="col-6">
			<form action="{{route('minhas-compras')}}" method="GET">
			<input class="form-control rounded-pill" name="search" id="search" type="text" placeholder="Procurar..">
			</form>
		</div>
		<div class="col-6"></div>
	</div>

	@foreach ($buy_tickets as $buy_ticket)
	<div class="card rounded">
		<div class="card-body">
			<div class="row">
				<div class="col-6 mt-3">
					<div class="row">
						<div class="col-4">
							<div class="row">
								<label for="name" style="font-size: 13px">
									Nome
								</label>
							</div>
							
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->user->first_name}} {{$buy_ticket->user->last_name}}
							</span>
						</div>
						<div class="col-2">
							<div class="row">
								<label for="name" style="font-size: 13px">
									Voo
								</label>
							</div>
							
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->airline->name}}
							</span>

						</div>
						<div class="col-3">
							<div class="row">
								<label for="name" style="font-size: 13px">
									Tarifa
								</label>
							</div>
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->tariff->name}}
							</span>
						</div>
						<div class="col-3">
							<div class="row">
								<label for="name" style="font-size: 13px">
								Preço pago
								</label>
							</div>
							<span class="text-secondary" style="font-weight: bold">
								{{number_format($buy_ticket->amount,2,',','.')}}
							</span>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="row mt-3">
						<div class="col-3">
							<div class="row">
								<label for="name" style="font-size: 13px">
								Método
								</label>
							</div>
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->method}}
							</span>
						</div>
						<div class="col-3">
							<div class="row">
								<label for="name" style="font-size: 13px">
								Data
								</label>
							</div>
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->created_at}}
							</span>
						</div>
						<div class="col-3">
							<div class="row">
								<label for="name" style="font-size: 13px">
								Estado
								</label>
							</div>
							@if($buy_ticket->status_validate == 1)
							<a class="btn btn-success" style="border-radius: 20px" style="font-weight: bold">
								Pago
							</a>
							@else
							<a class="btn btn-danger" style="border-radius: 20px;font-weight: bold">
								{{$buy_ticket->method}}
							</a>
							@endif
						</div>
						<div class="col-3">
							<div class="row mt-3">
								<label for="name" style="font-size: 13px">
								
								</label>
							</div>
							<a class="btn btn-danger" style="border-radius: 20px" style="font-weight: bold">
								Cancelar
							</a>
						</div>
					</div>
				</div>
				
			</div>
			 
		</div>
  	</div>
	@endforeach

	@if (count($buy_tickets) == 0 && $search)
	  <div class="row">
		<div class="text-center">
		  <p style="font-size: 18px">Nenhuma frota encotrado<a href="{{route('minhas-compras')}}"><b>Ver todos</b></a></p>
		</div>
	  </div>
	@endif

	<div class="d-flex">
		<div class="align-self-center mx-auto">
			{{$buy_tickets->appends(['search'=>isset($search)?$search:''])->links()}}
		</div>
	</div>
	
@endsection