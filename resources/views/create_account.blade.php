@extends('layouts.main')
@section('title', 'PDC AIRLINE - Criar Conta')

@section('content')
 
    <div class="container">
        @if (session('success'))
			<div class="alert alert-success alert-dismissible fade show text-center mt-3">
				<span>{{session('success')}}</span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-3">
                <span>{{session('error')}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form {{--id="formRegister" name="formRegister"--}} method="POST" action="{{route('register')}}">
            @csrf
            <div class="mt-4 d-flex justify-content-center">
                <h1 class="text-center">Registo de Membro PDC Airline</h1>
            </div>
            <div class="text-center alert alert-danger" id="resultBox" style="display: none">
                <a id="result"></a>
            </div>
            <div class="form-row mt-2">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control rounded" value="{{ old('first_name') }}" name="first_name" id="first_name"
                        placeholder="" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <label for="lastname">Sobrenome</label>
                    <input type="text" class="form-control rounded" value="{{ old('last_name') }}" name="last_name" id="last_name"
                        placeholder="" required>
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="name">Título</label>
                            <select class="form-control rounded" name="title" id="title" required>
                                <option value="">Seleccionar</option>
                                <option value="sr">Senhor</option>
                                <option value="sra">Senhora</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="name">Género</label>
                            <select class="form-control rounded" name="gender" id="gender" required>
                                <option value="">Seleccionar</option>
                                <option value="f">Femenino</option>
                                <option value="m">Masculino</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="lastname">Data Nascimento</label>
                            <input type="date" class="form-control rounded" value="{{ old('birth_date') }}" name="birth_date" id="birth_date"
                                placeholder="" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="name">Idioma de Preferência</label>
                            <input type="text" class="form-control rounded" value="{{old('preferred_language')}}" name="preferred_language"
                                id="preferred_language" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>
            
            {{--<div class="form-row mt-1">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <label for="lastname">Preferência de Viagem</label>
                    <select class="form-control rounded" name="preference_air" id="preference_air"
                        required>
                        <option value="1">Refeição - Vegetariano e Tipo de lugar - Janela</option>
                        <option value="2">Refeição - Vegetariano e Tipo de lugar - Janela</option>
                        <option value="3">Refeição - Vegetariano e Tipo de lugar - Janela</option>
                    </select>
                </div>
            </div>--}}
            <div class="form-row mt-1">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="name">Morada</label>
                            <input type="text" class="form-control rounded" name="address" id="address"
                                placeholder="" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="name">Contacto Telefônico</label>
                            <input type="text" class="form-control rounded" name="contact" id="contact"
                                placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="row">    
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="lastname">Email</label>
                            <input type="text" class="form-control rounded" name="email" id="email"
                                placeholder="" required>
                        </div>
                    
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="lastname">PIN de Acesso</label>
                            {{--<input type="password" class="form-control rounded" name="pin_access"
                                id="pin_access" placeholder="" required>--}}
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control" type="password" name="pin_access">
                                <div class="input-group-addon bg-primary p-2">
                                    <a href=""><i class="fa fa-eye-slash" style="color: #fff" aria-hidden="true"></i></a>
                                </div>
                            </div>
                                
                        </div>
                        {{--<input type="checkbox" onclick="showHidePin()">Mostrar PIN--}}
                        
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary" style="width: 50%" {{--id="btn-formReg"--}}>Registar</button>
            </div>
        </form>
    </div>
@endsection
