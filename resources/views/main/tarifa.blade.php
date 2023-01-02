@extends('layouts.main')

@section('title', 'TARIFAS')

@section('content')

<div class="tarifa">
    <h1>NOSSAS TARIFAS</h1>
</div>

<div class="tarifasc">
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
                    <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz100mil; a taxa de emissão não é reembolsável.</td>
                    <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é reembolsável.<br />
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
                    <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz50mil; a taxa de emissão não é reembolsável.</td>
                    <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é reembolsável.<br />
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
                <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz75mil/kz100mil; a taxa de emissão não é reembolsável.</td>
                <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz50mil/kz30mil; a taxa de emissão não é reembolsável.</td>
                <td>Sim, se solicitado antes da partida, com pagamento de taxa desde kz50mil/kz30mil; a taxa de emissão não é reembolsável.</td>
                <td>Reembolso total (se solicitado antes da partida); a taxa de emissão não é reembolsável.</td>
            </tr>

        </tbody>
    </table>
    </div>
    <p><strong>N/A</strong>- Não aplicável</p>

</div>





@endsection