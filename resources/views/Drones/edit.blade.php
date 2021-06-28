@extends('Layout.template-terciary')

@section('title', 'Editar Drone')

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

                <form class="w-50" name="EditarDrones" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Modelo</label>

                        <input type="text" value="{{ $drone->model }}" class="form-control" id="inputModel" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Comprador</label>

                            <input type="text" value="{{ $client[0]->real_name }}" class="form-control" id="inputCompany" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de compra</label>

                            <input type="date" value="{{ $drone->purchase_date }}" class="form-control" id="inputPurchase" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de fabricação</label>

                            <input type="date" value="{{ $drone->production_date }}" class="form-control" id="inputProduction" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Descrição</label>

                            <textarea class="form-control" id="inputDescription"
                            placeholder="{{ $drone->description }}"
                            rows="4" readonly></textarea>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Status</label>

                            <input type="text" class="form-control" value="{{ $drone->status }}" readonly>

                        </div>

                    </div>

                </form>



                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

                <form class="w-50" action="/drones/{{ $drone->id }}" name="EditarDrones" method="POST">
                @method('PATCH')

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Modelo</label>

                            <select name="model" class="form-control">

                            <option value="{{ $drone->model }}" selected> {{ $drone->model }} (atual) </option>

                                <option value="X800 BIO">X800 BIO</option>
                                <option value="X800 GEO">X800 GEO</option>
                                <option value="X800 PPK">X800 PPK</option>

                            </select>
                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Comprador</label>

                            <select name="company_id" class="form-control">
                                @foreach ($companies as $company)

                                    @if($company->real_name == $client[0]->real_name)
                                        <option value="{{ $client[0]->id }}" selected> {{ $client[0]->real_name }} (atual) </option>
                                    @endif

                                <option value="{{ $company->id }}">{{ $company->real_name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de compra</label>

                            <input type="date" value="{{ $drone->purchase_date }}" name="purchase_date" class="form-control" id="inputPurchase">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de fabricação</label>

                            <input type="date" value="{{ $drone->production_date }}" name="production_date" class="form-control" id="inputProduction">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Descrição</label>

                            <textarea name="description" class="form-control" id="inputDescription"
                            rows="4">{{ $drone->description }}</textarea>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Status</label>

                            <select name="status" class="form-control">

                            <option value="{{ $drone->status }}" selected> {{ $drone->status }} (atual) </option>

                                <option value="Em manutenção">Em manutenção</option>
                                <option value="Liberado">Liberado</option>

                            </select>
                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                       <button type="reset" class="btn btn-secondary">Descartar alterações</button>
                       <button type="submit" class="btn btn-outline-danger">Salvar</button>
                    </form>

                    <form action="/confirm/delete" method="POST">

                        <input type="hidden" value="{{ $drone->id }}" name="id">
                        <input type="hidden" value="/drones/delete" name="route">
                        <button type="submit" class="btn btn-danger mt-2">Deletar</button>

                    </form>

                    </div>


            </div>

        </div>

    </div>

    </div>

    </div>

@endsection
