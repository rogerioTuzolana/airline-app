@extends('layouts.member')

@section('title', 'PDC Airline - Meu Perfil')
@section('route', 'Meu Perfil')

@section('content')
	
<form action="" id="formRegister" name="formRegister">
	@csrf
	<div class="mt-1 d-flex justify-content-center">
		<h1 class="text-center" style="font-size: 20pt">Atualizar Registo</h1>
	</div>
	<div class="text-center alert alert-danger" id="resultBox" style="display: none">
	   <a id="result"></a>
	</div>
	<div class="form-row mt-2">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="name">Nome</label>
				<input type="text" class="form-control rounded" name="first_name" id="first_name" placeholder="" value="{{Auth::user()->first_name}}" required>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="lastname">Sobrenome</label>
				<input type="text" class="form-control rounded" name="last_name" id="last_name" placeholder="" value="{{Auth::user()->last_name}}" required>
			</div>
		</div>
	
	</div>
	<div class="form-row mt-1">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="name">Título</label>
				<select class="form-control rounded" name="title" id="title" required>
					<option value="sr" @if(Auth::user()->client->title == 'sr') selected @endif>Senhor</option>
					<option value="sra" @if(Auth::user()->client->title == 'sra') selected @endif>Senhora</option>
				</select>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="name">Contacto Telefônico</label>
				<input type="text" class="form-control rounded" name="contact" id="contact" value="{{Auth::user()->contact}}" placeholder="" required>
			</div>
		</div>
	</div>
	<div class="form-row mt-1">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="name">Género</label>
				<select class="form-control rounded" name="gender" id="gender" required>
					<option value="f" @if(Auth::user()->client->member->gender == 'f') selected @endif>Femenino</option>
					<option value="m" @if(Auth::user()->client->member->gender == 'm') selected @endif>Masculino</option>
				</select>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="lastname">Data Nascimento</label>
				<input type="date" class="form-control rounded" name="birth_date" id="birth_date" value="{{Auth::user()->client->member->birthDate}}" placeholder="" required>
			</div>
		</div>
	</div>
	<div class="form-row mt-1">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="name">Idioma de Preferência</label>
				<input type="text" class="form-control rounded" name="preferred_language" id="preferred_language" value="{{Auth::user()->client->member->preferred_language}}" placeholder="" required>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="lastname">Preferência de Viagem</label>
				<select class="form-control rounded" name="preference_air" id="preference_air" required>
					<option value="1">Refeição - Vegetariano e Tipo de lugar - Janela</option>
					<option value="2">Refeição - Vegetariano e Tipo de lugar - Janela</option>
					<option value="3">Refeição - Vegetariano e Tipo de lugar - Janela</option>
				</select>
			</div>
		</div>
	</div>
	<div class="form-row mt-1">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="name">Morada</label>
				<input type="text" class="form-control rounded" name="address" id="address" value="{{Auth::user()->client->member->address}}" placeholder="" required>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<label for="lastname">Email</label>
				<input type="text" class="form-control rounded" name="email" id="email" placeholder="" value="{{Auth::user()->email}}"  required>
			</div>
		</div>
	</div>

	<div class="d-flex mt-3">
	   <button class="btn btn-primary" style="width: 100%" id="btn-formReg">Guardar</button>
	</div>
</form>

	
@endsection