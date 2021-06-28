@extends('Layout.template-quaternary')

@section('title', 'Adicionar Contato')

@section('content')

<div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222">
    <div class="container" style="background-color: #F5F5F5; height: 100vh">

    <div class="row">

        <div class="col-12 text-center">

            <h1 class="display-4 mt-4">
                <i class="fa fa-paper-plane text-danger" aria-hidden="true"></i>
                Adicionar novo contato
            </h1>

            <p class="lead text-center">Preencha os dados abaixo</p>

            <hr>

        </div>

    </div>

        <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">

            <form name="Contacts" action="/companies/contact/store" method="POST">
                <input type="hidden" name="company_id" value="{{$companyId}}">
                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputName">Nome*</label>

                        <input type="text" value="{{ old('name') }}" placeholder="Ex: Rogério Simas" class="form-control" id="inputName" name="name" required>

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputNumber">Número*</label>

                        <input type="text" name="number" value="{{ old('number') }}" placeholder="(14) 99999-9999"
                        attrname="telephone1" class="form-control" id="inputNumber" required>

                    </div>
                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputComplement">Departamento*</label>

                        <input type="text" value="{{ old('department') }}" placeholder="Ex: Vendas" class="form-control" id="inputDepartment" name="department" required>

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputEmail">E-mail*</label>

                        <input type="email" value="{{ old('email') }}" placeholder="Ex: rogerio@gmail.com" class="form-control" id="inputEmail" name="email" required>

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
