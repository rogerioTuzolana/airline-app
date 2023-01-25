@extends('layouts.member')

@section('title', 'PDC Airline - Pagamento')
@section('route', 'Pagamento')

@section('content')
  	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30 bg-white">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-8">
					<div class="section-title text-center mt-2">
						<h1 class="text-secondary mb-4" style="font-size: 20pt">Escolher método de pagamento</h1>
					</div>
				</div>
			</div>
			
			@if (session('success'))
			<div class="alert alert-success alert-dismissible fade show text-center">
				<span>{{session('success')}}</span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
			@if (session('error'))
			<div class="alert alert-danger alert-dismissible fade show text-center">
				<span>{{session('error')}}</span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif

			{{--
				@if (session('success'))
				<div class="alert alert-success alert-dismissible fade show text-center">
					<span>{{session('success')}}</span>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				@endif

				@if (session('fail'))
				<div class="alert alert-danger alert-dismissible fade show text-center">
					<span>{{session('fail')}}</span>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				@endif
			--}}
			
			<div class="row mt-2 justify-content-center" >
				
				<div class="col-xl-5 col-lg-7 col-md-8 col-sm-12 mb-1">
					<form
					 action="{{route('payment')}}"
					 method="post" >
					@csrf

					<fieldset class="border p-2 mb-3">
						<legend class="float-none w-auto" style="font-size: 16px">Bilhete de Ida</legend>
					<div class="row">
					@foreach ($tariff_airlines as $tariff_airline)
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="tariff_id" value="{{$tariff_airline->tariff_id}}" >
								<label class="form-check-label" for="name" >{{$tariff_airline->name}} - <h6 class="text-center text-secondary">{{$data->n_ticket.'X'}} {{number_format($tariff_airline->amount,2,',','.')}}</h6></label>
							</div>
						</div>
					@endforeach
					</div>
					</fieldset>

					<fieldset class="border p-2 mb-3">
						<legend class="float-none w-auto" style="font-size: 16px">Bilhete de Volta</legend>
					<div class="row">
						@foreach ($tariff_airlines2 as $tariff_airline2)
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="return_tariff_id" value="{{$tariff_airline2->return_tariff_id}}" >
									<label class="form-check-label" for="name" >{{$tariff_airline2->name}} - <h6 class="text-center text-secondary">{{$data->n_ticket_return.'X'}} {{number_format($tariff_airline2->amount,2,',','.')}}</h6></label>
								</div>
							</div>
						@endforeach
					</div>
					</fieldset>
					{{--<input type="text" name="tel" value="{{$data->tel}}" hidden>
					<input type="text" name="email" value="{{$data->email}}" hidden>--}}
					<input type="text" name="n_ticket" value="{{$data->n_ticket}}" hidden>
					<input type="text" name="n_ticket_return" value="{{$data->n_ticket_return}}" hidden>
					<input type="text" name="airline_id" value="{{$data->date}}" hidden>
					<input type="text" name="return_airline_id" value="{{$data->date_return}}" hidden>
					<button type="submit" class="btn btn-plan" href="" style="padding:0;border-color:rgb(79, 133, 226);border-radius: 10px;color: #fff;width: 100%;background-color:#fff" {{--($user_plan->currency=='kz')? 'disabled':''--}} >
						<img src="/images/paypal.png" alt="" width="60px" height="60px">
					</button>
					</form>
				</div>	
			</div>
			
			{{--@else
			<div class="row mt-5 justify-content-center" >
				
				<div class="">
					Serviço de pagamento está indisponível
					
				</div>	
			</div>
			@endif--}}
		</div>
		
		
		
	</div>
	
@endsection