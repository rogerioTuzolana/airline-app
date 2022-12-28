
      
      @extends('layouts.main')
      @section('title', 'PDC AIRLINE')

      @section('content')
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
                              <li><img src="images/1.png" alt="#"/> RUA 145.Camama 1, Luanda</li>
                              <li><img src="images/2.png" alt="#"/> +244 9999999999</li>
                              <li><img src="images/3.png" alt="#"/> pdcairline@hmail.com</li>
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
                           <div class="logo"> <a href="#welcome"><img src="images/logo2.png" alt="#"><strong class="white">PDC AIRLINE</strong></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li class="active"> <a href="#">Home</a> </li>
                                 <li> <a href="#about">Acerca</a> </li>
                                 <li><a href="#travel">Viagens</a></li>
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
      <section >
         <div class="banner-main">
            <img src="images/banner3.jpg" alt="#"/>
            <div class="container">
               <div class="text-bg">
                  <h1><br> PDC Airline<br><strong class=""> O Mundo Na palama de sua Mão</strong></h1>
                  <div class="button_section" > <a class="main_bt" href="#">Comprar Bilhete</a>  </div>
                  <div class="container">
                     <form class="main-form">
                        <h3>Encontre Seu Passeio</h3>
                        <div class="row">
                           <div class="col-md-9">
                              <div class="row">
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label >Palavra-Chave</label>
                                    <input class="form-control" placeholder="" type="text" name="">
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label >Categoria</label>
                                    <select class="form-control" name="Any">
                                       <option>Alguma</option>
                                       <option>Option 1</option>
                                       <option>Option 2</option>
                                       <option>Option 3</option>
                                    </select>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label >Preço Min</label>
                                    <input class="form-control" placeholder="00.0" type="text" name="00.0">
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label >Duração</label>
                                    <input class="form-control" placeholder="Alguma" type="text" name="Alguma">
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label >Data</label>
                                    <input class="form-control" placeholder="Alguma" type="date" name="Alguma">
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label >Preço Max</label>
                                    <input class="form-control" placeholder="00.0" type="text" name="00.0">
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                              <a href="#">Procurar</a>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- about -->
      
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <br><br><br>
                     <h2>Acerca da Nossa Agencia de Viagem</h2>
                     <span> 
                        fato de que um leitor se distrairá com o conteúdo legível de uma página ao olhar para seu layout. O objetivo de usar Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos normal</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                     <div class="about-box">
                        <p> <span>Existem muitas variações de passagens de Lorem Ipsum disponíveis, mas a maioria sofreu alteração de alguma forma, por humor injetado ou palavras aleatórias que não parecem nem um pouco críveis. Se você vai usar uma passagem de Lorem Ipsum, precisa ter certeza de que existem muitas variações de passagens de Lorem Ipsum disponíveis, mas a maioria sofreu alteração de alguma forma, por humor injetado ou palavras aleatórias que não parecem mesmo um pouco crível. Se você vai usar uma passagem de Lorem Ipsum, você precisa ter certeza de que</span></p>
                        <div class="palne-img-area">
                           <img src="images/plane-img.png" alt="images">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a href="#">Comprar Bilhete</a>
         </div>
      </div>
      <!-- end about -->
      <!-- traveling -->
      <div id="travel" class="traveling">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <h2>SELECIONE OFERTAS PARA VIAJAR</h2>
                     <span>
                        É um fato há muito estabelecido que um leitor se distrairá com o conteúdo legível de uma página ao olhar para seu layout. O objetivo de usar Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos normal</span> 
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="traveling-box">
                     <i><img src="icon/travel-icon.png" alt="icon"/></i>
                     <h3>Países diferentes</h3>
                     <p> vai usar uma passagem de Lorem Ipsum, você precisa ser </p>
                     <div class="read-more">
                        <a  href="#">Mais informação</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="traveling-box">
                     <i><img src="icon/travel-icon2.png" alt="icon"/></i>
                     <h3>Passeios nas montanhas</h3>
                     <p> vai usar uma passagem de Lorem Ipsum</p>
                     <div class="read-more">
                        <a  href="#">Mais informação</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="traveling-box">
                     <i><img src="icon/travel-icon3.png" alt="icon"/></i>
                     <h3>Passeios de ônibus</h3>
                     <p> vai usar uma passagem de Lorem Ipsum, você precisa ser </p>
                     <div class="read-more">
                        <a  href="#">Mais informação</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="traveling-box">
                     <i><img src="icon/travel-icon4.png" alt="icon"/></i>
                     <h3>Descanso de verão</h3>
                     <p> vai usar uma passagem de Lorem Ipsum, você precisa ser </p>
                     <div class="read-more">
                        <a  href="#">Mais informação</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end traveling -->
      
      <!--Tours -->
      <div class="Tours">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>OS MELHORES PASSEIOS</h2>
                     <span>É um fato há muito estabelecido que um leitor se distrairá com o conteúdo legível de uma página ao olhar para seu layout. O objetivo de usar Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos normal</span> 
                  </div>
               </div>
            </div>
            <section id="demos">
               <div class="row">
                  <div class="col-md-12">
                     <div class="owl-carousel owl-theme">
                        <div class="item">
                           <img class="img-responsive" src="images/1.jpg" alt="#" />
                           <h3>Holiday Tour</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                        <div class="item">
                           <img class="img-responsive" src="images/2.jpg" alt="#" />
                           <h3>New York</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                        <div class="item">
                           <img class="img-responsive" src="images/3.jpg" alt="#" />
                           <h3>London</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                        <div class="item">
                           <img class="img-responsive" src="images/2.jpg" alt="#" />
                           <h3>Holiday Tour</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <!-- footer -->
   @endsection