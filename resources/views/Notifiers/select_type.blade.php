@extends('Layout.template-secondary')

@section('title', 'Entrar')

@section('content')


<div class="container ml-0" style="max-width: none">
        <div class="row bg-secondary">


            <div class="col-12 col-bg-6 text-center justify-content-center" style="height: 88vh; padding-top: 11%">
                <center>

                    <h2 class="mt-5 mb-4 text-dark">
                    <i class="fa fa-building"></i><b>
                    Escolha para qual área deseja adicionar lembrete</b></h2>

                    <br>

                    <form class="mb-5" method="POST" action="/notifiers/selection">

                        <input type="hidden" value="{{ $company_id }}" name="company_id">

                        <div class="form-row" style="justify-content: center">
                        <div class=" form-group col-sm-12">
                            <select name="type" class="form-control" style=" width: 400px" required>

                                <option value="" selected> Escolha o tipo de lembrete </option>

                                    <option value="Produto"> Produtos </option>
                                    <option value="Drone"> Drones </option>

                            </select>
                            </div>

                        </div>

                         <div class="form-row mt-4 justify-content-center" >
                            <div class=" form-group col-sm-12">
                                <input type="submit" class="btn btn-outline-dark" style="border-radius: 20px; float:center;" value="Próximo >>>">
                            </div>
                        </div>
                    </form>

                </center>
            </div>
        </div>
    </div>


</div>


@endsection
