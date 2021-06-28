@extends('Layout.template-terciary')

@section('title', 'Confirmar')

@section('content')

    <div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222; height:auto">

    <div class="container" style="background-color: #F5F5F5; height: 100vh">

        <div class="row">

            <div class="col-12 text-center">

                <h1 class="display-4 mt-4">
                    <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                    Editar
                </h1>

                <p class="lead text-center">Deseja marcar este lembrete como concluído?</p>

                <hr>

            </div>

        </div>

    <div class="row">

        <div class="col-12">

            <div style="display: flex; justify-content: center;">

                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

                <form class="w-50" action="/notifiers/conclusion" method="POST">

                    <input type="hidden" value="{{ $notifier[0]['id'] }}" name="notifier_id">

                    <div class="form-row justify-content-center">

                        <div class="form-group col-sm-8">

                            <label for="inputType">Lembrete</label>

                            <textarea name="description" class="form-control" id="inputDescription" rows="4" readonly>{{ $notifier[0]['description'] }}</textarea>

                        </div>

                    </div>

                    <div class="form-row justify-content-center">

                        <div class="form-group col-sm-8">

                            <label for="inputType">Selecione a opção que deseja</label>

                            <select name="answer" class="form-control">

                                <option value="yes" selected> Conclui o lembrete </option>
                                <option value="no"> Ainda não conclui o lembrete </option>

                            </select>
                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                       <button type="submit" class="btn btn-outline-danger">Enviar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    </div>

    </div>

@endsection
