@extends('Layout.template-terciary')

@section('title', 'Editar Pagamento')

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

                <form class="w-50" name="EditarPagamentos" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Vendedor</label>

                            <input type="text" value="{{ $payment->seller }}" class="form-control" id="inputSeller" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Comprador</label>

                            <input type="text" value="{{ $payment->buyer }}" class="form-control" id="inputBuyer" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Quantidade comprada</label>

                            <input type="number" value="{{ $payment->qtde }}" class="form-control" id="inputQtde" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Item comprado</label>

                            <input type="text" value="{{ $payment->item }}" class="form-control" id="inputItem" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Preço R$</label>

                            <input type="text" value="{{ $payment->price }}" class="form-control" id="inputItem" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data da compra</label>

                            <input type="date" value="{{ $payment->purchase_date }}" class="form-control" id="inputPurchaseDate" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Descrição</label>

                            <textarea class="form-control" id="inputDescription"
                            placeholder="{{ $payment->description }}"
                            rows="4" readonly></textarea>

                        </div>

                    </div>

                </form>



                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

                <form class="w-50" action="/payments/{{ $payment->id }}" name="EditarPagamentos" method="POST">
                @method('PATCH')

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Vendedor</label>

                            <input type="text" value="{{ $payment->seller }}" name="seller" class="form-control" id="inputSeller">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Comprador</label>

                            <div class="form-group left-inner-addon">

                                <select id="inputBuyer" name="buyer" class="form-control" required>
                                    <option value="{{ $payment->buyer }}" selected> {{ $payment->buyer }} (atual) </option>

                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Quantidade comprada</label>

                            <input type="number" value="{{ $payment->qtde }}" name="qtde" class="form-control" id="inputQtde">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Item comprado</label>

                            <input type="text" value="{{ $payment->item }}" name="item" class="form-control" id="inputItem">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Preço R$</label>

                            <input type="text" value="{{ $payment->price }}" name="price" class="form-control" id="inputItem"
                            maxlength="7"  onKeyPress="return(MascaraMoeda(this,'.',',',event))">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data da compra</label>

                            <input type="date" value="{{ $payment->purchase_date }}" name="purchase_date" class="form-control" id="inputPurchaseDate">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Descrição</label>

                            <textarea class="form-control" id="inputDescription"
                            name="description"
                            rows="4">{{ $payment->description }}</textarea>

                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                       <button type="reset" class="btn btn-secondary">Descartar alterações</button>
                       <button type="submit" class="btn btn-outline-danger">Salvar</button>

                    </form>

                    <form action="/confirm/delete" method="POST">

                        <input type="hidden" value="{{ $payment->id }}" name="id">
                        <input type="hidden" value="/payments/delete" name="route">

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
