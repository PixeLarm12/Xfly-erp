@extends('Layout.template-secondary')

@section('title', 'Home Serviços')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">
            <i class="fa fa-home text-danger" aria-hidden="true"></i>
            ADMINISTRADORES</h1>
            <p class="lead">Página Inicial</p>

        </div>

    </div>

    <div class="row justify-content-center">

        <h1> Listagem de Administradores </h1>

    </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome Completo</th>
              <th scope="col">E-mail</th>
              <th scope="col">Criado em</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>

          @foreach($users as $user)

            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{date('d/m/Y', strtotime($user->created_at))}}</td>
              <td><a href="users/{{$user->id}}/edit">Mais detalhes</a></td>
            </tr>

          @endforeach

          </tbody>
        </table>

        <div class="row justify-content-center">

            {!! $users->links() !!}

        </div>
        <br><br>
</div>

@endsection
