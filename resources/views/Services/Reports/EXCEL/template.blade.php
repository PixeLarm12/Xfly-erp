<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
    use App\Xfly\Model\Company;
    use App\Xfly\Model\Drone;
    use App\Xfly\Model\Product;
    $today = date('Y-m-d');

    $total = 0.00;
    $value = 0.00;
?>

    <table>
        <thead>
            <tr>
                <th style="text-align: center; font-family: arial; font-size: 9px; color: gray"><i> Gerado em: {{ date('d/m/Y', strtotime($today)) }} </i> </th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Vendedor</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Preço R$</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Data da compra</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Data de entrega</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Tipo de serviço</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Descrição</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Observação</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Empresa</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Drone (opcional)</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Produto (opcional)</b></th>
            </tr>

            @foreach($services as $service)
                <tr>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $service->seller }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $service->price }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ date('d/m/Y', strtotime($service->purchase_date)) }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ date('d/m/Y', strtotime($service->delivery_date)) }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $service->service }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $service->description }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $service->observation }}</td>

                    <td style="text-align: center; font-family: arial; font-size: 9px">
                        <?php
                            $client = Company::where('id', $service->company_id)->get();
                            echo $client[0]['name'];
                        ?>
                    </td>

                    <td style="text-align: center; font-family: arial; font-size: 9px">
                        <?php
                            $drone = Drone::where('id', $service->drone_id)->get();
                            if(count($drone) == 0){
                                echo "[VAZIO]";
                            }
                            else{
                                echo $drone[0]['model'];
                            }
                        ?>
                    </td>

                    <td style="text-align: center; font-family: arial; font-size: 9px">
                        <?php
                            $product = Product::where('id', $service->product_id)->get();
                            if(count($product) == 0){
                                echo "[VAZIO]";
                            }
                            else{
                                echo $product[0]['model'];
                            }
                        ?>
                    </td>
                </tr>
                <?php
                    $value = floatval($value) + floatval(str_replace(['.',','],'', $service->price));
                ?>

            @endforeach

                <?php
                    $decimal = substr((string) $value, -2);
                    $num = substr((string) $value, 0, -2);
                    $total = $num . "," . $decimal;
                ?>

            <tr></tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="background: #1c6cff; color:white; text-align: center; font-family: arial; font-size: 11px"> <b>Total</b> </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center; font-family: arial; font-size: 9px">R$ {{ $total }}</td>
            </tr>

        </tbody>
    </table>

</body>
</html>

