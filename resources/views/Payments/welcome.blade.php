@extends('Layout.template-secondary')

@section('title', 'Home Serviços')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">
            <i class="fa fa-home text-danger" aria-hidden="true"></i>
            PAGAMENTOS (COMPRAS)</h1>
            <p class="lead">Página Inicial</p>

        </div>

    </div>

    <div class="row justify-content-center mb-5">

        <a href="/payments/report">
            <button class="btn btn-success mr-4"> Gerar novo relatório </button>
        </a>

    </div>

    <div class="row justify-content-center">

        <h1> Listagem dos Pagamentos </h1>

    </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Preço R$</th>
              <th scope="col">Item</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Data de compra</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>

          @foreach($payments as $payment)

            <tr>
              <th scope="row">{{$payment->id}}</th>
              <td>{{$payment->price}}</td>
              <td>{{$payment->item}}</td>
              <td>{{$payment->qtde}}</td>
              <td>{{date('d/m/Y', strtotime($payment->purchase_date)) }}</td>
              <td><a href="payments/{{$payment->id}}/edit">Mais detalhes</a></td>
            </tr>

          @endforeach

          </tbody>
        </table>

        <div class="row justify-content-center">

            {!! $payments->links() !!}

        </div>
        <br><br>
</div>

@endsection
