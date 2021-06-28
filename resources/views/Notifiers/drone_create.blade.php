@extends('Layout.template-secondary')

@section('title', 'Entrar')

@section('content')

<div class="container ml-0" style="max-width: none">
        <div class="row bg-danger">


            <div class="col-12 col-bg-6 text-center justify-content-center" style="height: 100vh; padding-top: 11%">
                <center>

                    <h2 class="mt-5 mb-4 text-light">
                    <i class="fa fa-list-alt"></i>
                    Escolha o drone e digite seu lembrete</h2>

                    <br>
                    <form class="mb-5" method="POST" action="/notifiers">

                        <input type="hidden" value="{{ $company_id }}" name="company_id">

                        <div class="form-row" style="justify-content: center">
                        <div class=" form-group col-sm-4">
                            <select name="drone_id" class="form-control" style=" width: 400px" required>
                                <option value="">Escolha o drone que deseja</option>

                                @foreach($drones as $drone)

                                    <option value="{{ $drone->id }}"> {{ $drone->model }} {{ $drone->key }} </option>

                                @endforeach

                            </select>
                            </div>


                         <div class=" form-group col-sm-4">
                              <textarea class="form-control" style=" width: 400px" name="description" id="inputDescription"
                                placeholder="Ex: Trocar telemetria"
                                rows="4" required></textarea>
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
