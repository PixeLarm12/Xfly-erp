@extends('Layout.template-reports-primary')

@section('title', 'Relatório')

@section('content')

<?php

    use App\Xfly\Model\Company;
    use App\Xfly\Model\Drone;
    use App\Xfly\Model\Product;
    $total = 0.00;
    $value = 0.00;
    $today = date('Y-m-d');
?>

    <div class="jumbotron jumbotron-fluid mt-5" style="background-color: #b1cafc; max-width: 65rem; margin-bottom: 0; border: 2.5px; border-right: 0; border-style: solid; border-color: black;">
        <div class="container" style="padding-left: 0">
            <div class="row">
                <div class="col-6 text-left">
                    <p style="margin-bottom: 5px; margin-top: 5px; margin-left: 5px;"><b>PARCIAL DE SERVIÇOS PRESTADOS POR XFLY TECNOLOGIA</b></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Período -->
    <div class="row ml-0" style="max-width: 65rem">
        <div class="col-12 text-left" style="padding-left: 10px; margin-top:20px">
            <p><b>Data do relatório: {{ date('d/m/Y', strtotime($today)) }}</b></p>
        </div>
    </div>


@foreach($services as $service)

    <!-- Dados -->
    <div class="container" style="border: 2.5px solid; max-width: 56rem; padding: 0; margin-top: 30px">
            <div class="row">
                <div class="col-4" style="padding-right: 0">
                    <div class="text-left mb-0" style="background-color: #dedede">Vendedor: {{ $service->seller }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div style="margin-top: 10px;">Cliente:
                        <?php
                            $client = Company::where('id', $service->company_id)->get();
                            echo $client[0]['name'];
                        ?>
                    </div>
                </div>

                <div class="col-4">
                    <div style="margin-top: 10px;">Preço: R$ {{ $service->price }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div style="margin-top: 10px;">Drone (opcional):
                        <?php
                            $drone = Drone::where('id', $service->drone_id)->get();
                            if(count($drone) == 0){
                                echo "[VAZIO]";
                            }
                            else{
                                echo $drone[0]['model'];
                            }
                        ?>
                    </div>
                </div>

                <div class="col-4">
                <div style="margin-top: 10px;">Produto (opcional):
                        <?php
                            $product = Product::where('id', $service->product_id)->get();
                            if(count($product) == 0){
                                echo "[VAZIO]";
                            }
                            else{
                                echo $product[0]['model'];
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <div style="margin-top: 10px;">Data de compra: {{ date('d/m/Y', strtotime($service->purchase_date)) }}</div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row">
                        <div style="margin-top: 10px;">Data de entrega: {{ date('d/m/Y', strtotime($service->delivery_date)) }}</div>
                    </div>
                </div>

                <div class="col-4">
                    <div style="margin-top: 10px;">Serviço: {{ $service->service }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div style="margin-top: 10px">Descrição: {{ $service->description }}</div>
                </div>

                <div class="col-4">
                    <div style="margin-top: 10px">Observação: {{ $service->observation }}</div>
                </div>

            </div>

            <div class="row">
                <div class="col-4">
                    <div style="margin-top: 10px; margin-bottom: 10px">
                        <img style="width:120px; height:120px;" src="storage/services_images/{{ $service->image }}">
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="row">
                    <div class="col-6" style="padding: 0; border-top: 2.5px solid">
                        <div class="row">
                            <div class="col-4">
                                <div style="background-color: #dedede">Total gasto R$:</div>
                            </div>

                            <div class="col-8">
                                <div style="margin-top: 10px; margin-bottom: 10px">{{ $service->price }}<!-- Inserir aqui preço das manutenções --></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    $value = floatval($value) + floatval(str_replace(['.',','],'', $service->price));
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
                <p class="text-left mb-0 ml-1">
                    Valor total das manutenções: R$ {{ $total }}
                </p>
            </div>

        </div>
    </div>

@endsection
