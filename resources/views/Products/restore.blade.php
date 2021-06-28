<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando os Produtos</title>
</head>
<body>
    <ul>

        @foreach($products as $product)

        <li>

            <a href="/products/{{ $product->id }}/restore"> {{ $product->model }} </a>

        </li>


        @endforeach

    </ul>
</body>
</html>
