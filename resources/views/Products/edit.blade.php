@extends('Layout.template-terciary')

@section('title', 'Editar Produto')

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

                <form class="w-50" name="EditarProdutos" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Modelo</label>

                        <input type="text" value="{{ $product->model }}" class="form-control" id="inputModel" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Preço R$</label>

                            <i class="fa fa-money"></i>
                            <input type="text" value="{{ $product->price }}" class="form-control" id="inputPrice" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputDate">Descrição</label>
                            <textarea id="inputDescription"
                            placeholder="{{ $product->description }}"
                            class="form-control" rows="3" readonly></textarea>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Cliente</label>

                            <select id="inputClient" name="company_id" class="form-control" readonly>
                                <option value="" selected> {{ $company_id[0]['name'] }} (atual) </option>
                            </select>
                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Imagem</label>

                            <p>
                                <img src="/storage/products_images/{{ $product->image }}" width="150px">
                            </p>

                        </div>

                    </div>

                </form>



                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

            <form class="w-50" action="/products/{{ $product->id }}" enctype="multipart/form-data" name="EditarProdutos" method="POST">
                @method('PATCH')

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Modelo</label>

                            <input type="text" value="{{ $product->model }}" name="model" class="form-control" id="inputModel">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Preço R$</label>

                            <i class="fa fa-money"></i>
                            <input type="text" value="{{ $product->price }}" name="price" class="form-control"
                            maxlength="7"  onKeyPress="return(MascaraMoeda(this,'.',',',event))" id="inputPrice">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputDate">Descrição</label>
                            <textarea id="inputDescription"
                            name="description"
                            class="form-control" rows="3">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Cliente</label>

                            <select id="inputClient" name="company_id" class="form-control">
                                <option value="{{ $company_id[0]['id'] }}" selected> {{ $company_id[0]['name'] }} (atual) </option>

                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Imagem</label>

                            <input type="file" name="image" id="inputImage" class="form-control">

                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                       <button type="reset" class="btn btn-secondary">Descartar alterações</button>
                       <button type="submit" class="btn btn-outline-danger">Salvar</button>
                    </form>

                    <form action="/confirm/delete" method="POST">

                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="/products/delete" name="route">

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
