<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
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
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Comprador</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Vendedor</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Item</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Preço R$</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Quantidade</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Descrição</b></th>
                <th style="background: #9c1010; color:white; text-align: center; font-family: arial; font-size: 11px"><b>Data da compra</b></th>
            </tr>

            @foreach($payments as $payment)
                <tr>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $payment->buyer }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $payment->seller }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $payment->item }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $payment->price }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $payment->qtde }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ $payment->description }}</td>
                    <td style="text-align: center; font-family: arial; font-size: 9px">{{ date('d/m/Y', strtotime($payment->purchase_date)) }}</td>
                </tr>
                <?php
                    $value = floatval($value) + floatval(str_replace(['.',','],'', $payment->price));
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
                <td style="background: #1c6cff; color:white; text-align: center; font-family: arial; font-size: 11px"> <b>Total</b> </td>
            </tr>

            <tr>
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

