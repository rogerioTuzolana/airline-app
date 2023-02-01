@extends('layouts.main')
@section('title', 'PDC AIRLINE')

@section('content')
    <section>
        <div class="banner-main">
            <img src="images/banner1.jpg" alt="#" />
            <div class="container">
                <div class="text-bg">
                    <div class="">
                        <div id="bg-pub" class="">
                            <h1>PDC Airline o mundo Na palma de sua Mão</h1>
                        </div>
                    </div>
                    <div class="button_section" id="btnbilhte">
                        <a class="main_bt" href="{{route('comprarbilhete')}}" {{--data-toggle="modal" data-target=".bd-example-modal-lg"--}}
                            {{-- href="/bilhete" --}}>Comprar Bilhete</a>
                    </div>
                    <div class="container">
                        <form class="main-form">
                            <h3>Encontre Seu VOO</h3>
                            <div class="form-row">
                                <div class="col-md-9">
                                    <div class="row">

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <label>Local Origem</label>
                                            <input class="form-control" placeholder="local" type="text" name="">
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <label>Local Distino</label>
                                            <input class="form-control" placeholder="local" type="text" name="Alguma">
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <label>Categoria Tarifas</label>
                                            <select class="form-control" name="Any">
                                                <option @selected(true)>Seleciona</option>
                                                <option>Tarifas Domestica</option>
                                                <option>Europa/Africa</option>
                                                <option>America do Norte</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-6 col-12">
                                            <label>Data</label>
                                            <input class="form-control" placeholder="Alguma" type="date" name="Alguma">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-6 col-12">
                                            <label>Preço</label>
                                            <input class="form-control" placeholder="00.0" type="text" name="00.0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" id="btnbilhte">Procurar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" id="infob">
                    <div class="modal-header mt-3 d-flex justify-content-center text-center">
                        <h1 class="">Informe os dados</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span
                                aria-hidden="true">
                                &times;</span></button>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-11 col-12">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control rounded" name="name" id="name" placeholder="">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-11 col-12">
                            <label for="lastname">Sobrenome</label>
                            <input type="text" class="form-control rounded" name="lastname" id="lastname"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="categoriaidade" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Adulto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="categoriaidade" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Criança</label>
                            </div>

                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="genero">Genero</label>
                            <select class="form-control form-control-lg">
                                <option selected>selecionar</option>
                                <option>Masculino</option>
                                <option>Feminino</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label>Data Nascimento</label>
                            <input class="form-control" placeholder="Alguma" type="date" name="Alguma">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control rounded" name="email" id="email"
                                placeholder="">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="email">Telefone</label>
                            <input type="number" class="form-control rounded" name="email" id="email"
                                placeholder="">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cattarifas" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Domestico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cattarifas" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Internacional</label>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12">
                            <label for="origem">Aeroporto Origem</label>
                            <select class="form-control form-control-lg">
                                <option selected>selecionar</option>
                                <option>Angola</option>
                                <option>selecionar</option>
                                <option>selecionar</option>
                            </select>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12">
                            <label for="distino">Aeroporto Destino</label>
                            <select class="form-control form-control-lg">
                                <option selected>selecionar</option>
                                <option>Angola</option>
                                <option>selecionar</option>
                                <option>selecionar</option>
                            </select>


                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                            <label for="nbilhete">Nº Bilhete</label>
                            <select class="form-control rounded" id="nbilhete">
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="catbilhete" id="inlineRadio3"
                                value="option3">
                            <label class="form-check-label" for="inlineRadio1">Ida</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="catbilhete" id="inlineRadio4"
                                value="option4">
                            <label class="form-check-label" for="inlineRadio2">Ida e Volta</label>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="nbilhete">Data de Partida</label>
                            <select class="form-control rounded" id="nbilhete">
                                <option selected>selecionar</option>
                                <option>2</option>

                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="nbilhete">Data de Regresso</label>
                            <select class="form-control rounded" id="nbilhete">
                                <option selected>selecionar</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group justify-content-center mt-3 ">
                        <div class="col-12 mx-auto" style="width: 200px;">
                            <button type="submit" class="btn btn-primary btn-lg" id="cbilhete">Comprar Bilhete</button>
                        </div>
                    </div>
            </div>


            </form>

        </div>

    </div>
    </div>
    <!-- about -->

    <div id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">

                        <h2>Acerca da Nossa Agencia de Viagem</h2>
                        <span>
                            fato de que um leitor se distrairá com o conteúdo legível de uma página ao olhar para seu
                            layout. O objetivo de usar Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos
                            normal</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="about-box">
                            <p> <span>Existem muitas variações de passagens de Lorem Ipsum disponíveis, mas a maioria sofreu
                                    alteração de alguma forma, por humor injetado ou palavras aleatórias que não parecem nem
                                    um pouco críveis. Se você vai usar uma passagem de Lorem Ipsum, precisa ter certeza de
                                    que existem muitas variações de passagens de Lorem Ipsum disponíveis, mas a maioria
                                    sofreu alteração de alguma forma, por humor injetado ou palavras aleatórias que não
                                    parecem mesmo um pouco crível. Se você vai usar uma passagem de Lorem Ipsum, você
                                    precisa ter certeza de que</span></p>
                            <div class="palne-img-area">
                                <img src="images/plane-img.png" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="btnbilhte"> <a data-toggle="modal" data-target=".bd-example-modal-lg">
                    Comprar Bilhete</a>
            </div>
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
                            É um fato há muito estabelecido que um leitor se distrairá com o conteúdo legível de uma página
                            ao olhar para seu layout. O objetivo de usar Lorem Ipsum é que ele tem uma distribuição de
                            letras mais ou menos normal</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="traveling-box">
                        <i><img src="icon/travel-icon.png" alt="icon" /></i>
                        <h3>Países diferentes</h3>
                        <p> vai usar uma passagem de Lorem Ipsum, você precisa ser </p>
                        <div class="read-more" id="btnbilhte">
                            <a href="#">Mais informação</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="traveling-box">
                        <i><img src="icon/travel-icon2.png" alt="icon" /></i>
                        <h3>Passeios montanhas</h3>
                        <p> vai usar uma passagem de Lorem Ipsum, você precisa ser</p>
                        <div class="read-more" id="btnbilhte">
                            <a href="#">Mais informação</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="traveling-box">
                        <i><img src="icon/travel-icon3.png" alt="icon" /></i>
                        <h3>Passeios de ônibus</h3>
                        <p> vai usar uma passagem de Lorem Ipsum, você precisa ser </p>
                        <div class="read-more" id="btnbilhte">
                            <a href="#">Mais informação</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="traveling-box">
                        <i><img src="icon/travel-icon4.png" alt="icon" /></i>
                        <h3>Descanso de verão</h3>
                        <p> vai usar uma passagem de Lorem Ipsum, você precisa ser </p>
                        <div class="read-more" id="btnbilhte">
                            <a href="#">Mais informação</a>
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
                        <span>É um fato há muito estabelecido que um leitor se distrairá com o conteúdo legível de uma
                            página ao olhar para seu layout. O objetivo de usar Lorem Ipsum é que ele tem uma distribuição
                            de letras mais ou menos normal</span>
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
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="images/2.jpg" alt="#" />
                                <h3>New York</h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="images/3.jpg" alt="#" />
                                <h3>London</h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="images/2.jpg" alt="#" />
                                <h3>Holiday Tour</h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in soe suffk even slightly believable. If y be sure there</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <div id="tarifario" class="tarifasc">
        <div class="container">

            <div class="titlepage">
                <h2> CONHEÇA AS NOSSAS TARIFAS</h2>
            </div>
            <div id="tipo-tarifa">
                <h1>TARIFAS DOMESTRICAS</h1>
                <p>As Tarifas domésticas aplicam-se nas viagens local Angola DE/PARA</p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="success">
                        <tr class="table-info">
                            <th class="white-bg th-top" colspan="1" scope="col"></th>
                            <th class="white-bg th-top" colspan="3" scope="col">Classe económica</th>
                            <th class="white-bg th-top" scope="col">Classe executiva</th>

                        </tr>

                    </thead>
                    <thead class="thead-dark">

                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Desconto</th>
                            <th scope="col">Inteligente</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Conforto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="first-row">
                            <th class="frst-col" scope="row">Bagagem de cabine</th>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 15kg<br />
                                Dimensões 55x40x20</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Bagagem de porão</th>
                            <td>Peso total 23kg</td>
                            <td>Peso total 35kg, máximo de 23kg por volume</td>
                            <td>Peso total 46kg, máximo de 23kg por volume</td>
                            <td>Peso total 64kg, máximo de 32kg por volume</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Bagagem prioritária</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Marcação de lugar</th>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td>Gratuito</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Check-in diferenciado</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Fast Track</th>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td>Gratuito</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Lounge</th>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td>Gratuito</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Embarque prioritário</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Refeição</th>
                            <td>Sim</td>
                            <td>Sim</td>
                            <td>Sim</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Alteração de reserva</th>
                            <td>Desde kz55mil</td>
                            <td>Desde kz40mil</td>
                            <td>Gratuito (se solicitado antes da partida); Adicionais de tarifa serão cobrados</td>
                            <td>Gratuito (se solicitado antes da partida); Adicionais de tarifa serão cobrados</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Reembolsável</th>
                            <td>n/a</td>
                            <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz100mil; a taxa de emissão
                                não
                                é reembolsável.</td>
                            <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é
                                reembolsável.<br />
                                Açores e Madeira: sim, com pagamento de taxa desde kz40mil</td>
                            <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é reembolsável.</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <p><strong>N/A</strong>- Não aplicável</p><br><br>


            <div id="tipo-tarifa">
                <h1>EUROPA/AFRICA</h1>
                <p>Vianges entre Angola e Europa/Africa</p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="success">
                        <tr class="table-info">
                            <th class="white-bg th-top" colspan="1" scope="col"></th>
                            <th class="white-bg th-top" colspan="3" scope="col">Classe económica</th>
                            <th class="white-bg th-top" scope="col">Classe executiva</th>

                        </tr>

                    </thead>
                    <thead class="thead-dark">

                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Desconto</th>
                            <th scope="col">Inteligente</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Conforto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Bagagem de cabine</th>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 15kg<br />
                                Dimensões 55x40x20</td>
                        </tr>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Bagagem de porão</th>
                            <td>Peso total 23kg</td>
                            <td>Peso total 35kg, máximo de 23kg por volume</td>
                            <td>Peso total 46kg, máximo de 23kg por volume</td>
                            <td>Peso total 64kg, máximo de 32kg por volume</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Bagagem prioritária</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Marcação de lugar</th>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td>Gratuito</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Check-in diferenciado</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Fast Track</th>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td>Gratuito</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Lounge</th>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td>Gratuito</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Embarque prioritário</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Refeição</th>
                            <td>Sim</td>
                            <td>Sim</td>
                            <td>Sim</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Alteração de reserva</th>
                            <td>Desde kz40mil</td>
                            <td>Desde kz48mil</td>
                            <td>Gratuito (se solicitado antes da partida); Adicionais de tarifa serão cobrados</td>
                            <td>Gratuito (se solicitado antes da partida); Adicionais de tarifa serão cobrados</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="last-row">
                            <th class="frst-col" scope="row">Reembolsável</th>
                            <td>n/a</td>
                            <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz50mil; a taxa de emissão
                                não
                                é reembolsável.</td>
                            <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é
                                reembolsável.<br />
                                Açores e Madeira: sim, com pagamento de taxa desde kz40mil</td>
                            <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é reembolsável.</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <p><strong>N/A</strong>- Não aplicável</p>

            </tbody>
            </table>

            <div id="tipo-tarifa">
                <h1>AMERICA DO NORTE</h1>
                <p>Viagens de Angola para Estados Unidos e Canadá</p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="success">
                        <tr class="table-info">
                            <th class="white-bg th-top" colspan="1" scope="col"></th>
                            <th class="white-bg th-top" colspan="3" scope="col">Classe económica</th>
                            <th class="white-bg th-top" scope="col">Classe executiva</th>

                        </tr>

                    </thead>
                    <thead class="thead-dark">

                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Desconto</th>
                            <th scope="col">Inteligente</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Conforto</th>
                        </tr>
                    </thead>
                    <tbody>
                        </tr>
                        <tr class="first-row">
                            <th class="frst-col" scope="row">Bagagem de cabine</th>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 8kg<br />
                                Dimensões 55x40x20</td>
                            <td>1 volume com 15kg<br />
                                Dimensões 55x40x20</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Bagagem de porão</th>
                            <td>1 volume com peso máximo de 23kg</td>
                            <td>1 volume com peso máximo de 23kg</td>
                            <td>2 volumes com peso total de 46kg, máximo de 23kg por volume</td>
                            <td>2 volumes com peso total de 64kg, máximo de 32kg por volume</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Bagagem prioritária</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Marcação de lugar</th>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td><a href="/bilhete" target="_blank">Disponível para compra</a></td>
                            <td>Gratuito</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Check-in diferenciado</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Embarque prioritário</th>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>n/a</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Refeição</th>
                            <td>Sim</td>
                            <td>Sim</td>
                            <td>Sim</td>
                            <td>Sim</td>
                        </tr>
                        <tr>
                            <th class="frst-col" scope="row">Alteração de reserva</th>
                            <td>Desde kz50mil/kz30mil</td>
                            <td>Desde kz50mil/kz30mil</td>
                            <td>Gratuito (se solicitado antes da partida); Adicionais de tarifa serão cobrados</td>
                            <td>Gratuito (se solicitado antes da partida); Adicionais de tarifa serão cobrados</td>
                        </tr>
                        <tr class="last-row">
                            <th class="frst-col" scope="row">Reembolsável</th>
                            <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz75mil/kz100mil; a taxa de
                                emissão não é reembolsável.</td>
                            <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz50mil/kz30mil; a taxa de
                                emissão não é reembolsável.</td>
                            <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz50mil/kz30mil; a taxa de
                                emissão não é reembolsável.</td>
                            <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é reembolsável.</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <p><strong>N/A</strong>- Não aplicável</p>
        </div>
    </div>

@endsection
