@extends('Layout.template-terciary')

@section('title', 'Selecionar empresa')

@section('content')

<div class="container">

  <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">EMPRESAS</h1>
            <p class="lead"> Escolha a empresa e a opção para qual deseja adicionar um serviço </p>

            <form action="/search-companies/services" method="POST" class="form-inline justify-content-center">
                <input name="search" class="form-control mt-2 ml-4 mr-2" type="search" placeholder="Buscar...">
                <button class="btn btn-dark" type="submit">OK</button>
            </form>

        </div>

  </div>
  <br>

  <div class="row justify-content-sm-center">

        @for($i = 0; $i < count($companies); $i++)

            @if($i%3 == 0)
                </div>
                <div class="row justify-content-sm-center">
            @endif

            <div class="col-sm-3 col-md-3 mb-4">

                <div style="height:500px;" class ="card border-secondary">

                    <img class="card-img-top" style="width:auto; height: 200px;" src="/storage/companies_images/{{$companies[$i]['avatar']}}">

                    <div class="card-body">

                        <h4 class="card-title">{{$companies[$i]['name']}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>

                        <p class="card-text"> <i> {{$companies[$i]['cnpj']}} </i> </p>
                        <p class="card-text"> {{$companies[$i]['email']}} </p>

                        <div class="card-body justify-content-center">

                            <a href="/companies/{{$companies[$i]['id']}}/drones" class="card-link"> Adicionar serviço para <b>Drone</b> </a><br><br>
                            <a href="/companies/{{$companies[$i]['id']}}/products" class="card-link">Adicionar serviço para <b>Produtos</b></a><br>

                        <hr>

                        </div>

                    </div>

                </div>

            </div>

        @endfor

    </div>
    </div>


@endsection
