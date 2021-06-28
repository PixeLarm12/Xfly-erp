@extends('Layout.template-terciary')

@section('title', 'Editar Serviço')

@section('content')

<?php

    use App\Xfly\Model\Company;

?>

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

                <form class="w-50" name="EditarServicosDrones" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Drone</label>

                            <input type="text" value="{{ $item[0]['model'] }} {{ $item[0]['key'] }}" class="form-control" id="inputPrice" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Vendedor</label>

                            <select id="inputBuyer" name="seller" class="form-control" readonly>
                                <option value="{{ $service->seller }}" selected> {{ $service->seller }} (atual) </option>
                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Preço R$</label>

                            <i class="fa fa-money"></i>
                            <input type="text" value="{{ $service->price }}" name="price" class="form-control" id="inputPrice" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Imagem</label>

                            <img src="/storage/services_images/{{ $service->image }}" width="150px">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Arquivo Param</label>

                            <li>

                                <a href="/services/download-param/{{ $service->param }}"> Fazer download do arquivo </a>

                            </li>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de entrega</label>

                            <input type="date" value="{{ $service->delivery_date }}" name="delivery_date" class="form-control" id="inputDelivery" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de compra</label>

                            <input type="date" value="{{ $service->purchase_date }}" name="purchase_date" class="form-control" id="inputPurchase" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Tipo do serviço</label>

                            <select class="form-control" name="service" readonly>
                                <option value="{{ $service->service }}" selected> {{ $service->service }} (atual) </option>
                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Descrição</label>

                            <textarea name="description" class="form-control" id="inputDescription" rows="4" readonly>{{ $service->description }}</textarea>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Observação</label>

                            <textarea name="observation" class="form-control" id="inputObservation" rows="4" readonly>{{ $service->observation }}</textarea>

                        </div>

                    </div>

                </form>



                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

            <form class="w-50" action="/services/{{ $service->id }}/drone" enctype="multipart/form-data" name="EditarDrone" method="POST">
            @method('PATCH')

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Drone</label>

                            <select id="inputDrone" name="drone_id" class="form-control">
                                <option value="{{ $item[0]['id'] }}" selected> {{ $item[0]['model'] }} {{ $item[0]['key'] }} (atual) </option>

                                @foreach($drones as $drone)

                                    <option value="{{ $drone->id }}"> {{ $drone->model }} {{ $drone->key }} </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Vendedor</label>

                            <select id="inputBuyer" name="seller" class="form-control">
                                <option value="{{ $service->seller }}" selected> {{ $service->seller }} (atual) </option>

                                @foreach ($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Preço R$</label>

                            <i class="fa fa-money"></i>
                            <input type="text" value="{{ $service->price }}" name="price" class="form-control"
                            id="inputPrice" maxlength="7"  onKeyPress="return(MascaraMoeda(this,'.',',',event))">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Imagem</label>

                            <img src="/storage/services_images/{{ $service->image }}" width="150px">

                            <input type="file" name="image" id="inputImage" class="form-control">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Arquivo .param</label>

                            <input type="file" name="param" id="inputParam" class="form-control">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de entrega</label>

                            <input type="date" value="{{ $service->delivery_date }}" name="delivery_date" class="form-control" id="inputDelivery">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data de compra</label>

                            <input type="date" value="{{ $service->purchase_date }}" name="purchase_date" class="form-control" id="inputPurchase">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Tipo do serviço</label>

                            <select class="form-control" name="service">
                                <option value="{{ $service->service }}" selected> {{ $service->service }} (atual) </option>
                                <option value="Venda"> Venda </option>
                                <option value="Manutenção"> Manutenção </option>
                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Descrição</label>

                            <textarea name="description" class="form-control" id="inputDescription" rows="4">{{ $service->description }}</textarea>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Observação</label>

                            <textarea name="observation" class="form-control" id="inputObservation" rows="4">{{ $service->observation }}</textarea>

                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                       <button type="reset" class="btn btn-secondary">Descartar alterações</button>
                       <button type="submit" class="btn btn-outline-danger">Salvar</button>
                    </form>

                    <form action="/confirm/delete" method="POST">

                        <input type="hidden" value="{{ $service->id }}" name="id">
                        <input type="hidden" value="/services/delete" name="route">

                        <button type="submit" class="btn btn-danger mt-2">Deletar</button>

                    </form>

                    </div>


            </div>

        </div>

    </div>

  </div>

</div>

<script>
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e)
    {
        var sep = 0;
        var key = '';
        var i = j = 0;
        var len = len2 = 0;
        var strCheck = '0123456789';
        var aux = aux2 = '';
        var whichCode = (window.Event) ? e.which : e.keyCode;
        if (whichCode == 13) return true;
        key = String.fromCharCode(whichCode); // Valor para o código da Chave
        if (strCheck.indexOf(key) == -1) return false; // Chave inválida
        len = objTextBox.value.length;
        for(i = 0; i < len; i++)
            if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
        aux = '';
        for(; i < len; i++)
            if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
        aux += key;
        len = aux.length;
        if (len == 0) objTextBox.value = '';
        if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
        if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
        if (len > 2) {
            aux2 = '';
            for (j = 0, i = len - 3; i >= 0; i--) {
                if (j == 3) {
                    aux2 += SeparadorMilesimo;
                    j = 0;
                }
                aux2 += aux.charAt(i);
                j++;
            }
            objTextBox.value = '';
            len2 = aux2.length;
            for (i = len2 - 1; i >= 0; i--)
            objTextBox.value += aux2.charAt(i);
            objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
        }
        return false;
    }
</script>

@endsection

