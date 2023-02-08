<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- Favicons -->
    <link href="/images/voo.png" rel="icon">
    <link href="/images/voo.png" rel="apple-touch-icon">
    <!-- site metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- Responsive-->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="header_white_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="header_information">
                                <ul>
                                    <li><img src="images/1.png" alt="#" /> RUA 145.Camama 1, Luanda</li>
                                    <li><img src="images/2.png" alt="#" /> +244 9999999999</li>
                                    <li><img src="images/3.png" alt="#" /> pdcairline@hmail.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="header_information">
                                <a href="#" class="btn btn-primary" onclick="modalLogin()"
                                    style="border:coral 1px solid;background-color:#ff7839;border-radius: 20px">Entrar</a>
                                <a href="#" onclick="modalCreateMember()" class="btn btn-primary"
                                    style="border-radius: 20px;background-color:#08809B">Criar conta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                        <div class="full">
                            <div class="center-desk">

                                <div class="d-flex justify-content-center">
                                    <div class="logo d-flex align-items-center w-auto">
                                    <a href="">
                                         
                                            <img src="/images/logo2.png" alt="">
                                            <span class=""><strong class="white">PDC Airline</strong></span>
                                       
                                    </a>
                                     </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-0 col-sm-0">
                        <div class="menu-area">
                            <div class="limit-box d-flex justify-content-center">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"><a href="{{route('homepage')}}">Home</a></li>
                                        <li><a @if (isset($status)) href="{{route('homepage')}}#about" @else href="#about" @endif >Sobre Nos</a> </li>
                                        <li><a @if (isset($status)) href="{{route('homepage')}}#travel" @else href="#travel" @endif>Viagens</a></li>
                                        <li><a @if (isset($status)) href="{{route('homepage')}}#tarifario" @else href="#tarifario" @endif>Tarifas</a></li>
                                        <li><a @if (isset($status)) href="{{route('homepage')}}#contact" @else href="#contact" @endif>Fale Conosco</a></li>
                                    </ul>
                                </nav>
                                {{-- <div>
                           <a href="#" class="btn btn-primary">Entrar</a>
                           <a href="#" class="btn btn-primary">Criar conta</a>
                        </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    @yield('content')
    <!-- footer -->
    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row pdn-top-30">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <ul class="location_icon">
                            <li> <a href="#"><img src="icon/facebook.png"></a></li>
                            <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                            <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                            <li> <a href="#"><img src="icon/instagram.png"></a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="Follow">
                            <h3>Fale Conosco</h3>
                            <span> Rua 145 Camama 1 <br>Luanda,Belas<br>
                                Angola<br>
                                +244 999999999</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="Follow">
                            <h3>LINKS ADICIONAIS</h3>
                            <ul class="link">
                                <li> <a href="#about">Sobre Nos</a></li>
                                <li> <a href="#">Termos e Condições</a></li>
                                <li> <a href="#"> Política de Privacidade</a></li>
                                <li> <a href="#travel">Novidades</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="Follow">
                            <h3> Contato</h3>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <input class="Newsletter" placeholder="Nome" type="text">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <input class="Newsletter" placeholder="Email" type="text">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="textarea" placeholder="comentario" type="text"></textarea>
                                </div>
                            </div>
                            <div id="btnbilhte">
                                <a class="Subscribe ">Enviar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <p>Copyright 2022 PDC Airline . Todos direitos reservados</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLog" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-lg modal-login modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="text-center alert alert-danger" id="resultBox" style="display: none">
                        <a id="result"></a>
                    </div>
                    <div class="d-flex flex-column text-center">
                        <form action="" id="formLogin" method="POST" name="formLogin">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" class="form-control rounded"
                                    id="emailL"placeholder="Seu email" required>
                                <div class="invalid-feedback">Email inválido</div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control rounded" id="pin_accessL"
                                    placeholder="Sua senha" required>
                                <div class="invalid-feedback">Senha inválido</div>
                            </div>
                            <div class="d-flex">
                                <button style="width: 100%" class="btn btn-primary btn-block btn-round"
                                    id="btn-formLogin">
                                    {{-- <span id="login-spinner" class="" role="status" aria-hidden="true"></span> --}}
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">

                    <div class="signup-section">Esqueci o PIN? <a href="#a" onclick="modalRecover()"
                            class="text-info"> Recuperar</a>.</div>

                </div>
            </div>
        </div>
    </div>

   <!-- end footer -->
   <!-- Javascript files-->
   <script src="/js/jquery.min.js"></script>
   <script src="/js/popper.min.js"></script>
   <script src="/js/bootstrap.bundle.min.js"></script>
   <script src="/js/jquery-3.0.0.min.js"></script>
   @if (empty($route))
   <script src="/js/plugin.js"></script>
   @endif
   
   <!-- sidebar -->
   <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="/js/custom.js"></script>
   <!-- javascript -->
   <script src="/js/owl.carousel.js"></script>
   <script src="/public/js/custom.js"></script>
   <script src="/register.js"></script>
   <script src="/js/regular_user.js"></script>
   <script src="/admin/assets/js/jquery.mask.min.js"></script>
   <script>
      function modalCreateMember(params) {
      //$("#btn-addTariff").html('Adicionar');
      //$("#name").val("");
      //$("#category").val("economic");
      //$("#amount").val("");
      //$("#tariff_id").val("");
      var modal = document.getElementById('exampleModalReg')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
    function modalLogin(){
      var modal = document.getElementById('exampleModalLog')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
   </script>

</body>



</html>
