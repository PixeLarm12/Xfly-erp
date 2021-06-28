@extends('Layout.template-secondary')

@section('title', 'Excluir')

@section('content')

<div class="container ml-0" style="max-width: none">
        <div class="row bg-danger">


            <div class="col-12 col-bg-6 text-center justify-content-center" style="height: 100vh; padding-top: 11%">
                <center>

                    <h2 class="mt-5 mb-4 text-light">
                    Deseja realmente excluir este dado?</h2>

                    <br>
                    <form class="mb-5" method="POST" action="{{ $route }}">

                        <input type="hidden" value="{{ $id }}" name="id">
                        <div class="form-row" style="justify-content: center">
                        <div class=" form-group col-sm-4">

                            <select name="confirm" class="form-control" style=" width: 400px">
                                <option value="0" selected> Não </option>
                                <option value="1"> Sim </option>
                            </select>

                        </div>

                        </div>
                         <div class="form-row mt-4 justify-content-center" >
                            <div class=" form-group col-sm-12">
                                <input type="submit" class="btn btn-success" style="border-radius: 20px; float:center;" value="Salvar">
                            </div>
                        </div>
                    </form>

                    <br><br><br>

                </center>
            </div>
        </div>
    </div>


</div>


@endsection
