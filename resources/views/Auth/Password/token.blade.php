@extends('Layout.template-secondary')

@section('title', 'Alterar senha')

@section('content')


<div class="container ml-0" style="max-width: none">
        <div class="row">
            <div class="col-6 col-bg-6 justify-content-center" style="height: 100vh; padding-top: 4%; ">
                <center>
                 <img style="height: 77vh; width:90vh " src = "../../../../src/img/forgot.png">
                </center>
            </div>

            <div class="col-6 col-bg-6 text-center bg-secondary" style="height: 100vh; padding-top: 11%">
                <center>

                    <h1 class="mt-5 mb-4" style = "color:#B22222" ><b>Redefinição de senha</b></h1>
                    <h6 style = "color: white">Digite o código enviado ao seu e-mail</h6>
                    <br>

                    <?php

                        $color = ($message[0]['type'] == 'message') ? 'black' : '#B22222';

                    ?>
                        <h6 style = "color: {{ $color }}"> {{ $message[0]['content'] }} </h6>

                    <br>

                    <form class="mb-5" method="POST" action="/password/token">

                        <input type="hidden" name="user_id" value="{{ $user[0]['id'] }}">

                        <div class="form-row" style="justify-content: center">

                            <div class="form-group col-sm-6 mr-5">
                                <label> Digite o código enviado: </label>
                                <input type="text" maxlength="4" name="token" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-row" style="justify-content: center">
                            <div class="col-sm-7">
                                <input type="submit" class="btn btn-outline-light" style="border-radius: 20px" value="Verificar código">
                            </div>
                        </div>
                    </form>


                </center>
            </div>
        </div>
    </div>

@endsection
