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
				<div class="col-lg-6 col-md-12 col-sm-12 mt-3">
					<div class="row">
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="row">
								<label for="name" style="font-size: 13px">
									Nome
								</label>
							</div>
							
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->user->first_name}} {{$buy_ticket->user->last_name}}
							</span>
						</div>
						<div class="col-lg-2 col-sm-12 col-md-12">
							<div class="row">
								<label for="name" style="font-size: 13px">
									Voo
								</label>
							</div>
								
							@foreach ($buy_ticket->tariff_airline_tickets as $tariff_airline_ticket)
							<div class="row">
								<span class="text-secondary" style="font-weight: bold">
									{{$tariff_airline_ticket->airline->name}}
								</span>
							</div>
							@endforeach

						</div>
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="row">
								<label for="name" style="font-size: 13px">
									Tarifa
								</label>
							</div>
							@foreach ($buy_ticket->tariff_airline_tickets as $tariff_airline_ticket)			
							<div class="row">
								<span class="text-secondary" style="font-weight: bold">
									{{$tariff_airline_ticket->tariff->name}}
								</span>
							</div>
							@endforeach
						</div>
						<div class="col-lg-3 col-md-12 col-sm-12">
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
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="row mt-3">
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="row">
								<label for="name" style="font-size: 13px">
								Método
								</label>
							</div>
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->method}}
							</span>
						</div>
						<div class="col-lg-3 col-md-12 col-sm-12">
							<div class="row">
								<label for="name" style="font-size: 13px">
								Data
								</label>
							</div>
							<span class="text-secondary" style="font-weight: bold">
								{{$buy_ticket->created_at}}
							</span>
						</div>
						<div class="col-lg-3 col-md-12 col-sm-12">
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
								Cancelado
							</a>
							@endif
						</div>
						@if ($buy_ticket->status_validate == 1)
						<div class="col-lg-3 col-md-12 col-sm-12 mt-3">
				
							<a class="btn btn-danger" style="border-radius: 20px" onclick="modalCancelBuy('{{Crypt::encryptString($buy_ticket->id)}}')" style="font-weight: bold">
								Reembolso
							</a>
						</div>
						@endif
						
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
	
	<div class="modal fade" id="exampleModalCancelBuy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-lg modal-dialog modal-dialog-centered">
		  <div class="modal-content">
			<div class="modal-header border-bottom-0">
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			  <div class="form-title text-center">
				<h4>Confirmar o reembolso</h4>
			  </div>
			  <div class="text-center alert alert-danger" id="resultBoxB" style="display: none">
					<a id="resultB"></a>
				</div>
			  <div class="d-flex flex-column text-center" style="margin-top: 25px">
				  
				  <div class="d-flex justify-content-center">
					  <div>
						<form id="formCancelBuy" method="POST" name="formCancelBuy">
						@csrf
						@method('DELETE')
						<input type="text" class="form-control rounded" id="cancel_buy_id" hidden>
						<button type="submit" class="btn btn-block btn-round text-white btn-danger" id="btn-cancelBuy">Confirmar</button>
						</form>
						</div>
					  <div style="margin-left: 20px">
						<button class="btn btn-block btn-round text-white" style="background: #d8703b;" id="btn-cancelB">Cancelar</button>
					  </div>
				  </div>          
			  </div>
	  
			</div>
		  </div>
		</div>
	</div>
	
@endsection