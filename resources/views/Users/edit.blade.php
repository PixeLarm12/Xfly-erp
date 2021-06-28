@extends('Layout.template-terciary')

@section('title', 'Editar Administrador')

@section('content')

    <div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222; height:auto">

    <div class="container" style="background-color: #F5F5F5; height: 100vh">

        <div class="row">

            <div class="col-12 text-center">

                <h1 class="display-4 mt-4">
                    <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                    Editar
                </h1>

                <p class="lead text-center">Faça a alteração do que desejar</p>

                <hr>

            </div>

        </div>

    <div class="row">

        <div class="col-12">

            <div style="display: flex; justify-content: center;">

                <form class="w-50" name="EditarAdministradores" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Nome completo</label>

                        <input type="text" value="{{ $user->name }}" class="form-control" id="inputName" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">E-mail</label>

                            <input type="text" value="{{ $user->email }}" class="form-control" id="inputEmail" readonly>

                        </div>

                    </div>

                </form>



                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

                <form class="w-50" action="/users/{{ $user->id }}" name="EditarAdministradores" method="POST">
                @method('PATCH')

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Nome completo</label>

                        <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="inputName">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">E-mail</label>

                            <input type="text" value="{{ $user->email }}" name="email" class="form-control" id="inputEmail">

                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                       <button type="reset" class="btn btn-secondary">Descartar alterações</button>
                       <button type="submit" class="btn btn-outline-danger">Salvar</button>
                    </form>

                    <form action="/confirm/delete" method="POST">

                        <input type="hidden" value="{{ $user->id }}" name="id">
                        <input type="hidden" value="/users/delete" name="route">
                        <button type="submit" class="btn btn-danger mt-2">Deletar</button>

                    </form>

                    </div>


            </div>

        </div>

    </div>

    </div>

    </div>

@endsection
