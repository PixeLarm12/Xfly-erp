@extends('Layout.template-terciary')

@section('title', 'Drones')

@section('content')

<div class="container">

  <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 >DRONES</h1>
            <p class="lead"> Empresa {{ $company->name }} </p>

        </div>

  </div>
  <br>


<div class="row mb-2 ml-5 mr-5" style="justify-content: center" >

    <?php
        use App\Xfly\Model\Drone;
    ?>
<div class= "box" >
    @foreach($drones as $drone)
        
    <div class="card-deck col" style="max-width:280px; min-width:250px;">

      @if ( $drone->status  == "Em manutenção")
        <div class="card border-danger mb-3" >
            <div class="card-body text-danger">
            <h4 class="card-title">{{$drone->model}} {{$drone->key}}</h4>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item" >Descrição: {{ $drone->description }}</li>
            <li class="list-group-item">Status:  <b> {{ $drone->status }} </b> </li>
            </ul>
            <div class="card-body">
            <a style="color:#505ABD" href="/drones/{{$drone->id}}/details"> Mais detalhes</a>
            </div>
        </div>
      @endif

      @if ( $drone->status  == "Liberado")
        <div  class="card border-success mb-3" >
            <div class="card-body text-success">
            <h4 class="card-title">{{$drone->model}} {{$drone->key}}</h4>
            </div>
            <ul class="list-group list-group-flush" >
            <li class="list-group-item "  >Descrição: {{ $drone->description }}</li>
            <li class="list-group-item" >Status:  <b> {{ $drone->status }} </b> </li>
            </ul>
            <div class="card-body">
            <a style="color:#505ABD" href="/drones/{{$drone->id}}/details"> Mais detalhes </a>
            </div>
        </div>
      @endif

    </div>
    
    @endforeach
    </div>
  <br><br>
</div>

  {!! $drones->links() !!}

<br>
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lembretes</h3>
    <p class="text-primary mt-2" style="padding-left: 40px"> <a href="/notifiers/select-company" >
            + Adicionar Lembrete</a> <p>
<br>
</div>

<div class= "box1">
@if(count($notifiers) > 0 )

<?php $i = 0; ?>
@foreach($notifiers as $notifier)


    <div class="row ">
        <div style="padding-left: 60px; padding-bottom: 40px;" class=" col">
            <div style= "padding-top:15px; padding-left:25px; background-color: #94FF8B; opacity:0.99; height:230px; width:450px; border-radius: 10px;
            float:center;" >
                
                <div style=" width: 385px; margin: 10px 10px 10px 10px" class ="card alert-danger border-secondary">

                    <div class="card-body text-dark">

                        <h4 class="card-title">
                        <i class="fa fa-exclamation-triangle"></i>
                         

                        <?php
                            $drone = Drone::where('id', $notifier->drone_id)->get();


                            echo $drone[0]['model'] . " " . $drone[0]['key'];
                        ?>

                        </h4>

                        <p class="card-text"> <i> {{ $notifier->description }} </i> </p>

                        <div class="card-body justify-content-center">
                            <a href="/notifiers/{{ $notifier->id }}/edit-drone"> Editar </a>
                            <a href="/notifiers/confirm/{{ $notifier->id }}">

                                <button class="btn btn-lg" style= "float:right ; background-color: #64BF47 ;
                                padding-top: 2px">
                                        <i class="fa fa-check-circle text-light" aria-hidden="true" ></i>
                                </button>

                            </a>

                        </div>

                    </div>

                </div>

            </div>
         </div>
  

<?php $i++; ?>
</div>
@endforeach

@else
<center>
    <div class="col-12 mb-5">
        <h4>Não existem lembretes!</h4>
    </div>
</center>
@endif




@endsection
