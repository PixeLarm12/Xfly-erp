@extends('Layout.template')

@section('title', 'Página Inicial')

@section('content')

<?php

    use App\Xfly\Model\Drone;
    use App\Xfly\Model\Company;
    use App\Xfly\Model\Product;
    use Illuminate\Support\Facades\Route;

?>

<div class="container">
    <div class="row">

        <div class="col-12 text-center my-5">
            <h1 >
            <i class="fa fa-sitemap text-danger" aria-hidden="true"></i>
            ERP XFLY TECNOLOGIA </h1>
            <p class="lead">Principais empresas e seus serviços</p>

            <form action="/search-companies" method="POST" class="form-inline justify-content-center">
                <input name="search" class="form-control mt-2 ml-4 mr-2" type="search" placeholder="Buscar...">
                <button class="btn btn-dark" type="submit">OK</button>
            </form>

        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">

        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
            <i class="fa fa-home"></i>
            Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
            <i class="fa fa-bell"></i>
            Lembretes</a>
        </li>

    </ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <div class="row justify-content-sm-center">

        @for($i = 0; $i < count($companies); $i++)

            @if($i%3 == 0)
                </div>
                <div class="row justify-content-sm-center">
            @endif

            <div class="col-sm-3 col-md-3 mb-4">
                <br>
    
          
                <div style="height:500px;" class ="card  border-secondary">

                    <img class="card-img-top" style="width:auto; height: 200px;"src="/storage/companies_images/{{$companies[$i]['avatar']}}">

                    <div class="card-body">

                        <h4 class="card-title">{{$companies[$i]['name']}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>

                        <p class="card-text"> <i> {{$companies[$i]['cnpj']}} </i> </p>
                        <p class="card-text"> {{$companies[$i]['email']}} </p>

                        <div class="card-body justify-content-center">

                        <a href="/companies/{{$companies[$i]['id']}}/edit" class="card-link">Editar empresa</a>
                        <br>
                        <a href="/companies/{{$companies[$i]['id']}}/drones" class="card-link">Ver drones</a>
                        <br>
                        <a href="/companies/{{$companies[$i]['id']}}/products" class="card-link">Ver outros produtos</a>

                            <hr>

                        </div>

                    </div>

                </div>
            <br>
        </div>

         @endfor

      </div>

     </div>

     <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">

     <p class="text-primary mt-2" style="padding-left: 85%"> <a href="/notifiers/select-company" >
            + Adicionar Lembrete</a> <p>

     <div class="row justify-content-sm-center">

        @for($i = 0; $i < count($notifiers); $i++)

            @if($i%3 == 0)
                </div>
                <div class="row justify-content-sm-center">
            @endif

            <?php

                $color = ($notifiers[$i]['drone_id'] != null) ? "alert-danger" : "alert-primary";
                $route = ($notifiers[$i]['drone_id'] != null) ? "edit-drone" : "edit-product";

                if($notifiers[$i]['drone_id'] != null){
                    $model = Drone::where('id', $notifiers[$i]['drone_id'])->get();
                    $drone = Drone::where('id', $notifiers[$i]['drone_id'])->get();
                    $companyName = Company::where('id', $drone[0]['company_id'])->get();
                }
                else{
                    $model = Product::where('id', $notifiers[$i]['product_id'])->get();
                    $product = Product::where('id', $notifiers[$i]['product_id'])->get();
                    $companyName = Company::where('id', $product[0]['company_id'])->get();
                }
            ?>

            <div class=" card-deck col-sm-3 col-md-3 mb-4">
                <br>
                <div  class ="card {{ $color }} border-secondary">

                    <div class="card-body text-dark">

                        <h4 class="card-title">{{ $companyName[0]['name'] }} - {{ $model[0]['model'] }} {{ $model[0]['key'] }}</h4>

                        <p class="card-text"> <i> {{$notifiers[$i]['description']}} </i> </p>

                        <div class="card-body justify-content-center">

                            <a href="/notifiers/{{ $notifiers[$i]['id'] }}/{{ $route }}"> Editar </a>

                            <a href="/notifiers/confirm/{{ $notifiers[$i]['id'] }}">

                                <button class="btn btn-lg" style= "float:right ; background-color: #64BF47 ;
                                padding-top: 2px">
                                        <i class="fa fa-check-circle text-light" aria-hidden="true" ></i>
                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <br><br>
            </div>

         @endfor

      </div>
    <br>
</div>


<script>

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

</script>

@endsection
