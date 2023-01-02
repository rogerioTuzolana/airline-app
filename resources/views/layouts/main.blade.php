<!DOCTYPE html>
<html lang="pt">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
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
                  <div class="col-md-12">
                     <div class="header_information">
                        <ul>
                           <li><img src="images/1.png" alt="#" /> RUA 145.Camama 1, Luanda</li>
                           <li><img src="images/2.png" alt="#" /> +244 9999999999</li>
                           <li><img src="images/3.png" alt="#" /> pdcairline@hmail.com</li>
                        </ul>
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
                        <div class="logo"> <a href="/"><img src="images/logo2.png" alt="PDC AIRLINE"><strong class="white">PDC AIRLINE</strong></a></div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li class="nav-link active" > <a href="/">Home</a> </li>
                              <li> <a href="/#about">Sobre Nos</a> </li>
                              <li><a href="/#travel">Viagens</a></li>
                              <li><a href="/tarifa">Tarifas</a></li>
                              <li><a href="#contact">Fala Conosco</a></li>
                           </ul>
                        </nav>
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
                        <li> <a href="#">Novidades</a></li>
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
                           <textarea class="textarea" placeholder="comment" type="text">Comentario</textarea>
                        </div>
                     </div>
                     <button class="Subscribe">Enviar</button>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <p>Copyright 2022 Todos os direitos reservados pela PDC-Airline<a href=""></a></p>
               </div>
            </div>
         </div>
      </div>
   </footer>
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
   <script>
      $(document).ready(function() {
         var owl = $('.owl-carousel');
         owl.owlCarousel({
            margin: 10,
            nav: true,
            loop: true,
            responsive: {
               0: {
                  items: 1
               },
               600: {
                  items: 2
               },
               1000: {
                  items: 3
               }
            }
         })
      })
   </script>

</body>

</html>