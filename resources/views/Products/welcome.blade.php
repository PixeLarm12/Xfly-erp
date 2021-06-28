@extends('Layout.template-secondary')

@section('title', 'Home Serviços')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">
            <i class="fa fa-home text-danger" aria-hidden="true"></i>
            PRODUTOS</h1>
            <p class="lead">Página Inicial</p>

        </div>

    </div>

    <div class="row justify-content-center">

        <h1> Listagem de Produtos </h1>

    </div>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Model</th>
            <th scope="col">Preço R$</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

        @foreach($products as $product)

            <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->model}}</td>
            <td>{{$product->price}}</td>
            <td>
                @if($product->description == null)
                    Vazio
                @else
                    {{ $product->description }}
                @endif
            </td>
            <td><a href="/products/{{$product->id}}/details">Mais detalhes</a></td>
            </tr>

        @endforeach

        </tbody>
    </table>

    <div class="row justify-content-center">

        {!! $products->links() !!}

    </div>
    <br><br>
</div>

@endsection
