@extends('Layout.template-reports-primary')

@section('title', 'Relatório')

@section('content')

    <div class="jumbotron jumbotron-fluid mt-5" style="background-color: #b1cafc; max-width: 65rem; margin-bottom: 0; border: 2.5px; border-right: 0; border-style: solid; border-color: black;">
        <div class="container" style="padding-left: 0">
            <div class="row">
                <div class="col-6 text-left">
                    <p style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px;"><b>PARCIAL DE COMPRAS FEITAS POR XFLY TECNOLOGIA</b></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Período -->
    <div class="row ml-0" style="max-width: 65rem">
        <div class="col-12 text-left" style="padding-left: 10px; margin-top:20px">
            <p><b>Período de: {{ date('d/m/Y', strtotime($initial)) }} até {{ date('d/m/Y', strtotime($final)) }}</b></p>
        </div>
    </div>

<?php
    $total = 0.00;
    $value = 0.00;
?>

@foreach($payments as $payment)

    <!-- Dados -->
    <div class="container" style="border: 2.5px solid; max-width: 56rem; padding: 0; margin-top: 30px">
            <div class="row">
                <div class="col-4" style="padding-right: 0">
                    <div class="text-left mb-0" style="background-color: #dedede">Item: {{ $payment->item }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div style="margin-top: 10px;">Comprador: {{ $payment->buyer }}</div>
                </div>

                <div class="col-4">
                    <div style="margin-top: 10px;">Vendedor: {{ $payment->seller }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <div style="margin-top: 10px;">Data de compra: {{ date('d/m/Y', strtotime($payment->purchase_date)) }}</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div style="margin-top: 10px;">Preço: R$ {{ $payment->price }}</div>
                </div>

                <div class="col-4">
                    <div style="margin-top: 10px;">Quantidade: {{ $payment->qtde }}</div>
                </div>
            </div>

            <div class="row">
                <div style="margin-top: 10px; margin-bottom: 10px;">Descrição: {{ $payment->description }}</div>
            </div>

            <div class="col-4">
                <div class="row">
                    <div class="col-6" style="padding: 0; border-top: 2.5px solid">
                        <div class="row">
                            <div class="col-4">
                                <div style="background-color: #dedede">Total gasto R$:</div>
                            </div>

                            <div class="col-8">
                                <div style="margin-top: 10px; margin-bottom: 10px">{{ $payment->price }}<!-- Inserir aqui preço das manutenções --></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    $value = floatval($value) + floatval(str_replace(['.',','],'', $payment->price));
?>

@endforeach
    <?php
        $decimal = substr((string) $value, -2);
        $num = substr((string) $value, 0, -2);
        $total = $num . "," . $decimal;
    ?>

    <!-- Valor total das manutenções -->
    <div style="max-width: 56rem">
        <div class="row">

            <div class="col-1" style="padding: 0"></div>

            <br>

            <div class="col-4" style="border: 2.5px solid;">
                <p class="text-left mb-0 ml-2">
                    Valor total das compras: R$ {{ $total }}
                </p>
            </div>

        </div>
    </div>

@endsection
