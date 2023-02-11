{{--@extends('layouts.email')

@section('content')

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="/img/logo2.png" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Teste</h5>
        <p class="card-text">Rota</p>
        <a href="#" class="btn btn-primary">Clique aqui</a>
        </div>
    </div>
@endsection--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PDC Airline</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/logo2.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="/css/bootstrap.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="fixed-top d-flex align-items-center">
    
  </header>

  <main id="main">
    <section class="section">
      <div class="container">
          
        {{--@yield('content')--}}
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <table>
              <tr>
                <h1>PDC Airline</h1>
              </tr>
              <tr>
                
              </tr>

              <tr>
                <h4 class="card-title">Código do membro</h4>
                <h6 class="card-text">{{$user->id.''.$user->client->id.''.$user->client->member->id}}</h6>
     
              </tr>
            </table>
                           
          </div>
        </div>
      </div>
    </section>

  </main>



</body>

</html>