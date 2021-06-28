@extends('Layout.template-quaternary')

@section('title', 'Adicionar Serviço')

@section('content')

<?php  $today = date('Y-m-d'); ?>

<div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222">
    <div class="container" style="background-color: #F5F5F5; height: auto">

    <div class="row">

        <div class="col-12 text-center">

            <h1 class="display-4 mt-4">
                <i class="fa fa-cogs text-danger" aria-hidden="true"></i>
                Adicionar serviço para produto
            </h1>

            <p class="lead text-center">Preencha os dados abaixo</p>

            <hr>

        </div>

    </div>

        <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">

            <form name="Services" action="/services/product" method="POST" enctype="multipart/form-data">
                <div class="form-row justify-content-center">

                <input type="hidden" name="company_id" value="{{ $product->company_id }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="form-group col-sm-3">

                        <label for="inputSeller">Vendedor*</label>

                        <select id="inputBuyer" name="seller" class="form-control" required>
                            <option value="" selected>Escolha o vendedor:</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputService">Tipo do serviço*</label>

                        <select class="form-control" name="service" required>
                            <option value="Venda"> Venda </option>
                            <option value="Manutenção"> Manutenção </option>
                        </select>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputImage">Imagem do serviço (opcional)</label>

                        <input type="file" name="image" class="form-control" id="inputImage">

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputImage">Preço*</label>

                        <i class="fa fa-money"></i>
                        <input type="text" name="price" value="{{ old('price') }}" placeholder="R$00,00"
                        maxlength="7"  onKeyPress="return(MascaraMoeda(this,'.',',',event))" class="form-control" id="inputPrice" required>


                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputDelivery">Data de entrega*</label>

                        <input type="date" value="{{ $today }}" class="form-control" id="inputDelivery" name="delivery_date" required>

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputDelivery">Data de compra*</label>

                        <input type="date" value="{{ old('purchase_date') }}" class="form-control" id="inputDelivery" name="purchase_date" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputDescription">Descrição (opcional) </label>

                        <textarea placeholder="Ex: Bateria estava danificada" name="description" class="form-control" id="inputDescription" rows="4">{{ old('description') }}</textarea>


                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputObservation">Observação (opcional) </label>

                        <textarea placeholder="Ex: Bateria era a última em estoque" name="observation" class="form-control" id="inputObservation" rows="4">{{ old('observation') }}</textarea>

                    </div>

                </div>

                <div class="form-row justify-content-end">

                    <div class="col-sm-6 mb-4">

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;

                        <button type="reset" class="btn btn-secondary">Limpar</button>
                        <button type="submit" class="btn btn-outline-danger">Enviar</button>

                    </div>

                </div>

            </form>
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
