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
   <!-- site metas -->
   <title>@yield('title')</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/styles.css">

    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
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
                     <a href="#" class="btn btn-primary" onclick="modalLogin()" style="border:coral 1px solid;background-color:coral;border-radius: 20px">Entrar</a>
                     <a href="#" onclick="modalCreateMember()" class="btn btn-primary" style="border-radius: 20px">Criar conta</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="#"><img src="images/logo2.png" alt="PDC AIRLINE"><strong class="white">PDC AIRLINE</strong></a></div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li class="nav-link active"><a href="#">Home</a> </li>
                              <li> <a href="#about">Sobre Nos</a> </li>
                              <li><a href="#travel">Viagens</a></li>
                              <li><a href="#tarifario">Tarifas</a></li>
                              <li><a href="#contact">Fala Conosco</a></li>
                           </ul>
                        </nav>
                        {{--<div>
                           <a href="#" class="btn btn-primary">Entrar</a>
                           <a href="#" class="btn btn-primary">Criar conta</a>
                        </div>--}}
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
   <div class="modal fade" id="exampleModalLog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <input type="email" class="form-control rounded" id="emailL"placeholder="Seu email" required>
                     <div class="invalid-feedback">Email inválido</div>
                  </div>
                  <div class="form-group mb-3">
                     <input type="password" class="form-control rounded" id="pin_accessL" placeholder="Sua senha" required>
                     <div class="invalid-feedback">Senha inválido</div>
                  </div>
                  <div class="d-flex">
                     <button style="width: 100%" class="btn btn-primary btn-block btn-round" id="btn-formLogin">
                     {{--<span id="login-spinner" class="" role="status" aria-hidden="true"></span>--}}
                     Entrar
                     </button>
                  </div>          
               </form>
               </div>
      
            </div>
            <div class="modal-footer d-flex justify-content-center">
      
               <div class="signup-section">Esqueci o PIN? <a href="#a" onclick="modalRecover()" class="text-info"> Recuperar</a>.</div>
               
            </div>
         </div>
      </div>
   </div>
 

   <div class="modal fade" id="exampleModalReg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-title text-center">
              <h5 ></h5>
            </div>
            
            <form action="" id="formRegister" name="formRegister">
               @csrf
               <div class="mt-1 d-flex justify-content-center">
                   <h1 class="text-center">Registo de Membro PDC Airline</h1>
               </div>
               <div class="text-center alert alert-danger" id="resultBox" style="display: none">
                  <a id="result"></a>
               </div>
               <div class="form-row mt-2">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="name">Nome</label>
                     <input type="text" class="form-control rounded" name="first_name" id="first_name" placeholder="" required>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="lastname">Sobrenome</label>
                     <input type="text" class="form-control rounded" name="last_name" id="last_name" placeholder="" required>
                  </div>
               </div>
               <div class="form-row mt-1">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="name">Título</label>
                     <select class="form-control rounded" name="title" id="title" required>
                        <option value="sr">Senhor</option>
                        <option value="sra">Senhora</option>
                     </select>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                  </div>
               </div>
               <div class="form-row mt-1">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="name">Género</label>
                     <select class="form-control rounded" name="gender" id="gender" required>
                        <option value="f">Femenino</option>
                        <option value="m">Masculino</option>
                     </select>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="lastname">Data Nascimento</label>
                     <input type="date" class="form-control rounded" name="birth_date" id="birth_date" placeholder="" required>
                  </div>
               </div>
               <div class="form-row mt-1">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="name">Idioma de Preferência</label>
                     <input type="text" class="form-control rounded" name="preferred_language" id="preferred_language" placeholder="" required>
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
               <div class="form-row mt-1">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="name">Morada</label>
                     <input type="text" class="form-control rounded" name="address" id="address" placeholder="" required>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="lastname">Email</label>
                     <input type="text" class="form-control rounded" name="email" id="email" placeholder="" required>
                  </div>
               </div>
               <div class="form-row mt-1">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="name">Contacto Telefônico</label>
                     <input type="text" class="form-control rounded" name="contact" id="contact" placeholder="" required>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                     <label for="lastname">PIN de Acesso</label>
                     <input type="text" class="form-control rounded" name="pin_access" id="pin_access" placeholder="" required>
                  </div>
               </div>
               <div class="d-flex mt-3">
                  <button class="btn btn-primary" style="width: 100%" id="btn-formReg">Registar</button>
               </div>
            </form>
    
          </div>
          <div class="modal-footer d-flex justify-content-center">
              
          </div>
        </div>
      </div>
   </div>
    
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="public/js/custom.js"></script>
   <script src="register.js"></script>
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
