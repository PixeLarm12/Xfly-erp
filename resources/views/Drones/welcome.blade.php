@extends('Layout.template-secondary')

@section('title', 'Home Drones')

@section('content')

<?php use App\Xfly\Model\Company; ?>

<div class="container">

    <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">
            <i class="fa fa-home text-danger" aria-hidden="true"></i>
            DRONES</h1>
            <p class="lead">Página Inicial</p>

        </div>

    </div>

    <div class="row justify-content-center">

        <h1> Listagem de Drones </h1>

    </div>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Data de Compra</th>
                    <th scope="col">Data de Produção</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>

                @foreach($drones as $drone)
                <?php $i = 0; ?>
                <?php $color = $drone->status == "Liberado" ? 'green' : 'red'; ?>
                <tr>
                    <th scope="row">{{$drone->id}}</th>
                    <td>{{$drone->model}} {{$drone->key}}</td>
                    <td>{{date('d/m/Y', strtotime($drone->purchase_date))}}</td>
                    <td>{{date('d/m/Y', strtotime($drone->production_date))}}</td>
                    <td><?php
                            $a = Company::where('id', $drone->company_id)->get('real_name');
                            echo $a[$i]->real_name;
                        ?>
                    </td>
                    <td style="color: {{ $color }}">{{$drone->status}}</td>
                    <td><a href="drones/{{$drone->id}}/details">Mais detalhes</a></td>
                </tr>
                <?php $i++; ?>
                @endforeach

            </tbody>

        </table>

        <div class="row justify-content-center">

            {!! $drones->links() !!}



        </div>
        <br><br>

</div>

@endsection
