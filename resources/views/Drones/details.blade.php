@extends('Layout.template-terciary')

@section('title', 'Drones - detalhes')

@section('content')

  <div class="row">

        <div class="col-12 text-center mt-5">

            <h1>Drone {{ $drone->model }} {{$drone->key}}</h1>
            <p class="lead">Empresa {{ $client[0]->real_name }}</p>

        </div>

  </div>

  <div class="row mb-2 ml-5 mr-5" style="justify-content: center" >
    <div class="col-ssm-4">
        <div style="max-width: 300px;" class="card">
            <div class="card-body">
                <h4 class="card-subtitle">Informações do drone</h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Fabricado em: {{ date('d/m/Y', strtotime($drone->production_date)) }}</li>
                <li class="list-group-item">Descrição: {{ $drone->description }}</li>
                <li class="list-group-item">Status:  <b> {{ $drone->status }} </b> </li>
                <li class="list-group-item"><a href="/drones/{{ $drone->id }}/edit">Editar</a></li>
            </ul>
        </div>
    </div>
  </div>

    <div class="row" style="justify-content: center">
         <br>
        <h1> Serviços feitos ao drone </h1>
        <br><br>
    </div>

    <div class="row" style="justify-content: center">
        <a href="/services/create/drone/{{ $drone->id }}">
            <button class="btn btn-success mr-4"> Adicionar novo serviço </button>
            <br><br>
        </a>
    </div>

  @if(count($services) > 0)
  <div class="row mb-5 ml-5 mr-5" style="justify-content: center;" >

    <?php $i = 1; ?>
    <div class="box">
    @foreach($services as $service)

    <div class="card-deck col" style="min-width: 300px; max-width: 330px;
        padding-bottom:20px;">
            <div  class="card border-secondary">
                <div class="card-body">
                    <h2 class="card-title"> <b> {{ date('d/m/Y', strtotime($service->purchase_date)) }} </b> </h2>
                    <h6 class="card-subtitle" style="font-size: 12px"> <i> Última atualização: {{ date('d/m/Y', strtotime($service->updated_at)) }} </i> </h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Tipo de serviço: {{ $service->service }}</li>
                    <li class="list-group-item">Preço R$: {{ $service->price }}</li>
                    <li class="list-group-item">Descrição: {{ $service->description }}</li>
                    <li class="list-group-item">Observação: {{ $service->observation }}</li>


                    <li class="list-group-item"><a href="/services/{{$service->id}}/edit_drone">Editar</a></li>
                </ul>
            </div>
            <br><br>
        </div>

    <?php $i++; ?>
    @endforeach

  @endif

    </div>

        <div class="row justify-content-center">

            {!! $services->links() !!}

        </div>

    </div>

  @if(count($services) <= 0)

    <div class="row" style="justify-content: center">
        <h4> Nenhum serviço realizado para esse drone. </h4>
        <br><br>
    </div>

  @endif
@endsection
