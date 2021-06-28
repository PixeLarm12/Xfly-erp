@extends('Layout.template-terciary')

@section('title', 'Editar Empresa')

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

                <form class="w-50" name="EditarEmpresas" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Razão social</label>

                            <input type="text" value="{{ $company->real_name }}" class="form-control" id="inputRealName" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Nome fantasia</label>

                            <input type="text" value="{{ $company->name }}" class="form-control" id="inputName" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">CNPJ</label>

                            <input type="text" value="{{ $company->cnpj }}" class="form-control" id="inputCnpj" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">E-mail</label>

                            <input type="text" value="{{ $company->email }}" class="form-control" id="inputEmail" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Avatar</label>

                            <p><img src="/storage/companies_images/{{ $company->avatar }}" width="150px"></p>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Responsável</label>

                            <input type="text" value="{{ $company->owner }}" class="form-control" id="inputOwner" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Registro Municipal</label>

                            <input type="number" value="{{ $company->municipal_registration }}" class="form-control"
                            onkeypress="return onlynumber();"id="inputMunicipalRegistration" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Registro Estadual</label>

                            <input type="number" value="{{ $company->state_registration }}" class="form-control"
                            onkeypress="return onlynumber();" id="inputStateRegistration" readonly>

                        </div>
                </form>

                        <div class="form-group col-sm-8">
                        <ul>

                            <label for="inputType">Contatos</label>
                            @foreach($contacts as $key => $contact)

                                <li>
                                    <a href="/companies/contact/{{ $contact->id }}">{{ $contact->name }}</a>
                                </li>

                            @endforeach

                            <a href="/companies/contact/add/{{ $company->id }}"><b> Adicionar novo Contato</b> </a>

                        </ul>

                        </div>

                        <div class="form-group col-sm-8">
                        <ul>

                            <label for="inputType">Endereços</label>
                            @foreach($addresses as $address)

                                <li>
                                    <a href="/companies/address/{{ $address->id }}">{{ $address->street }}</a>
                                </li>

                            @endforeach

                            <a href="/companies/address/add/{{ $company->id }}"><b> Adicionar novo Endereço</b></a>

                        </ul>
                        </div>

                    </div>





                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

                <form class="w-50" action="/companies/{{ $company->id }}" enctype="multipart/form-data" name="EditarEmpresas" method="POST">
                @method('PATCH')

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Razão social</label>

                            <input type="text" value="{{ $company->real_name }}" name="real_name" class="form-control" id="inputRealName">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Nome fantasia</label>

                            <input type="text" value="{{ $company->name }}" name="name" class="form-control" id="inputName">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">CNPJ</label>

                            <input type="text" name="cnpj" value="{{ $company->cnpj }}"
                            maxlength="18" class="form-control" id="cnpj">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">E-mail</label>

                            <input type="text" value="{{ $company->email }}" name="email" class="form-control" id="inputEmail">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Avatar</label>

                            <input type="file" name="avatar" class="form-control" id="inputAvatar">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Responsável</label>

                            <input type="text" value="{{ $company->owner }}" name="owner" class="form-control" id="inputOwner">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Registro Municipal</label>

                            <input type="text" value="{{ $company->municipal_registration }}" name="municipal_registration"
                             class="form-control" onkeypress="return onlynumber();" maxlength="18" id="inputMunicipalRegistration" >

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Registro Estadual</label>

                            <input type="text" value="{{ $company->state_registration }}" name="state_registration" class="form-control"
                            onkeypress="return onlynumber();" maxlength="18" id="inputStateRegistration">

                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                       <button type="reset" class="btn btn-secondary">Descartar alterações</button>
                       <button type="submit" class="btn btn-outline-danger">Salvar</button>
                    </form>

                        <form action="/confirm/delete" method="POST">

                            <input type="hidden" value="{{ $company->id }}" name="id">
                            <input type="hidden" value="/companies/delete" name="route">

                            <button type="submit" class="btn btn-danger mt-2">Deletar</button>

                        </form>

                    </div>


            </div>

        </div>

    </div>

    </div>

    </div>
    <script >
        document.getElementById('cnpj').addEventListener('input', function(e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
    e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
    });
</script>

<script>
function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}
</script>
@endsection
