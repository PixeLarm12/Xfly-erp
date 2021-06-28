@extends('Layout.template-terciary')

@section('title', 'Editar Contato')

@section('content')

    <div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222">

    <div class="container" style="background-color: #F5F5F5; height: auto">

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

                <form class="w-50" name="EditarContatos" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Nome</label>

                            <input type="text" value="{{ $contact[0]['name'] }}" class="form-control" id="inputName" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Número</label>

                            <input type="text" value="{{ $contact[0]['number'] }}" class="form-control" id="inputNumber" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Departamento</label>

                            <input type="text" value="{{ $contact[0]['department'] }}" class="form-control" id="inputDepartment" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">E-mail</label>

                            <input type="text" value="{{ $contact[0]['email'] }}" class="form-control" id="inputEmail" readonly>

                        </div>

                    </div>

                </form>



                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

                <form class="w-50" action="/companies/contact/edit" name="EditarContatos" method="POST">

                    <input type="hidden" value="{{ $contact[0]['id'] }}" name="id">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Nome</label>

                            <input type="text" value="{{ $contact[0]['name'] }}" name="name" class="form-control" id="inputName">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Número</label>

                            <input type="text" value="{{ $contact[0]['number'] }}"
                             name="number" attrname="telephone1" class="form-control" id="inputNumber">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Departamento</label>

                            <input type="text" value="{{ $contact[0]['department'] }}" name="department" class="form-control" id="inputDepartment">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">E-mail</label>

                            <input type="text" value="{{ $contact[0]['email'] }}" name="email" class="form-control" id="inputEmail">

                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                        <button type="submit" class="btn btn-outline-danger">Salvar</button>
                    </form>

                    <form action="/confirm/delete" method="POST">

                        <input type="hidden" value="{{ $contact[0]['id'] }}" name="id">
                        <input type="hidden" value="/companies/contact/destroy" name="route">

                        <button type="submit" class="btn btn-danger mt-2">Deletar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    </div>

    </div>

    <script>

    var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
    var tel = document.querySelector('input[attrname=telephone1]');
    VMasker(tel).maskPattern(telMask[0]);
    tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

    function inputHandler(masks, max, event) {
        var c = event.target;
        var v = c.value.replace(/\D/g, '');
        var m = c.value.length > max ? 1 : 0;
        VMasker(c).unMask();
        VMasker(c).maskPattern(masks[m]);
        c.value = VMasker.toPattern(v, masks[m]);
    }


    </script>
@endsection
