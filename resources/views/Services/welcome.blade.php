@extends('Layout.template-secondary')

@section('title', 'Home Serviços')

@section('content')

<?php
    use App\Xfly\Model\Drone;
    use App\Xfly\Model\Product;
?>

<div class="container">

    <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">
            <i class="fa fa-home text-danger" aria-hidden="true"></i>
            SERVIÇOS</h1>
            <p class="lead">Página Inicial</p>

        </div>

    </div>

    <div class="row justify-content-center mb-5">

        <a href="/services/selection">
            <button class="btn btn-success mr-4"> Adicionar novo serviço </button>
        </a>

        <a href="/services/report">
            <button class="btn btn-success ml-4"> Gerar novo relatório </button>
        </a>

    </div>

    <div class="row justify-content-center">

        <h1> Listagem de Serviços Prestados </h1>

    </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Preço R$</th>
              <th scope="col">Item</th>
              <th scope="col">Tipo do Serviço</th>
              <th scope="col">Última edição em: </th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>

          @foreach($services as $service)

            <tr>
              <th scope="row">{{$service->id}}</th>
              <td>{{$service->price}}</td>
              <td>

                @if($service->drone_id != null)
                    <?php
                        $drone = Drone::where('id', $service->drone_id)->get();
                        echo $drone[0]['model'] . " " . $drone[0]['key'];
                    ?>
                @else
                <?php
                    $product = Product::where('id', $service->product_id)->get();
                    echo $product[0]['model'];
                ?>
                @endif

              </td>
              <td>{{$service->service}}</td>
              <td>{{ date('d/m/Y', strtotime($service->updated_at)) }}</td>

            @if($service->product_id)
              <td><a href="services/{{$service->id}}/edit_product">Mais detalhes</a></td>
            @endif

            @if(!$service->product_id)
              <td><a href="services/{{$service->id}}/edit_drone">Mais detalhes</a></td>
            @endif

            </tr>

          @endforeach

          </tbody>
        </table>

        <div class="row justify-content-center">

        {!! $services->links() !!}

        </div>
        <br><br>
</div>

@endsection
