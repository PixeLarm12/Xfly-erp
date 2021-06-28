@extends('Layout.template-terciary')

@section('title', 'Editar Endereço')

@section('content')

    <div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222">

    <div class="container" style="background-color: #F5F5F5; height:auto">

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

                <form class="w-50" name="EditarEndereços" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados atuais:</div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">CEP</label>

                            <input type="text" value="{{ $address[0]['zipcode'] }}" class="form-control" id="inputZipcode" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Rua (Adicione o número)</label>

                            <input type="text" value="{{ $address[0]['street'] }}" class="form-control" id="inputStreet" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Bairro</label>

                            <input type="text" value="{{ $address[0]['complement'] }}" class="form-control" id="inputComplement" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Cidade</label>

                            <input type="text" value="{{ $address[0]['city'] }}" class="form-control" id="inputCity" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Estado</label>

                            <input type="text" value="{{ $address[0]['state'] }}" class="form-control" id="inputState" readonly>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">País</label>

                            <input type="text" value="{{ $address[0]['country'] }}" class="form-control" id="inputCountry" readonly>

                        </div>

                    </div>

                </form>



                <div class="h-auto table" style="background-color: lightgray; width: 1px"></div>

                <form class="w-50" action="/companies/address/edit" name="EditarEndereços" method="POST">

                    <input type="hidden" value="{{ $address[0]['id'] }}" name="id">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Dados novos:</div>

                    <div class="form-group col-sm-8">

                         <label for="inputZipcode">CEP*</label>

                         <input type="text" onkeypress="return onlynumber();"  maxlength="9"
                         value="{{ $address[0]['zipcode'] }}" name="zipcode" class="form-control" id="inputZipcode">

                     </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Rua (Adicione o número)</label>

                            <input type="text" value="{{ $address[0]['street'] }}" name="street" class="form-control" id="inputStreet">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Bairro</label>

                            <input type="text" value="{{ $address[0]['complement'] }}" name="complement" class="form-control" id="inputComplement">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Cidade</label>

                            <input type="text" value="{{ $address[0]['city'] }}" name="city" class="form-control" id="inputCity">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Estado</label>

                            <input type="text" value="{{ $address[0]['state'] }}" name="state" class="form-control" id="inputState">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">País</label>

                            <select name="country" class="form-control" id="inputCountry">

                                <option value="{{ $address[0]['country'] }}" selected>{{ $address[0]['country'] }}</option>
                                <option value="Alemanha">Alemanha</option>
                                <option value="Angola">Angola</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Austrália">Austrália</option>
                                <option value="Áustria">Áustria</option>
                                <option value="Bolívia">Bolívia</option>
                                <option value="Bélgica">Bélgica</option>
                                <option value="Brasil">Brasil</option>
                                <option value="Cabo Verde">Cabo Verde</option>
                                <option value="Canadá">Canadá</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Colômbia">Colômbia</option>
                                <option value="Coreia do Norte">Coreia do Norte</option>
                                <option value="Coreia do Sul">Coreia do Sul</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Dinamarca">Dinamarca</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equador">Equador</option>
                                <option value="Escócia">Escócia</option>
                                <option value="Eslováquia">Eslováquia</option>
                                <option value="Eslovênia">Eslovênia</option>
                                <option value="Espanha">Espanha</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                                <option value="França">França</option>
                                <option value="Guiana">Guiana</option>
                                <option value="Guiana Francesa">Guiana Francesa</option>
                                <option value="Paraguai">Paraguai</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Peru">Peru</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Uruguai">Uruguai</option>
                                <option value="Venezuela">Venezuela</option>

                            </select>

                        </div>

                    </div>

                    <div style="float: right; margin: 15px">

                        <button type="submit" class="btn btn-outline-danger">Salvar</button>
                    </form>

                    <form action="/confirm/delete" method="POST">

                        <input type="hidden" value="{{ $address[0]['id'] }}" name="id">
                        <input type="hidden" value="/companies/address/destroy" name="route">

                        <button type="submit" class="btn btn-danger mt-2">Deletar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    </div>

</div>
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

<script>
jQuery("#inputZipcode").mask("99999-999");
</script>

</script>

<script>
function clear_form() {
    $("#inputStreet").val("");
    $("#inputComplement").val("");
    $("#inputCity").val("");
    $("#inputState").val("");

}

$("#inputZipcode").blur(function() {

    var zipcode = $(this).val().replace(/\D/g, '');


    if (zipcode!= "") {


        var validatezip = /^[0-9]{8}$/;


        if(validatezip.test(zipcode)) {

            $("#inputStreet").val("...");
            $("#inputComplement").val("...");
            $("#inputCity").val("...");
            $("#inputState").val("...");

            $.getJSON("https://viacep.com.br/ws/"+ zipcode +"/json/?callback=?", function(data) {

                if (!("erro" in data)) {
                    $("#inputStreet").val(data.logradouro);
                    $("#inputComplement").val(data.bairro);
                    $("#inputCity").val(data.localidade);
                    $("#inputState").val(data.uf);
                   ;
                }
                else {

                    clear_form();
                    alert("CEP não encontrado.");
                }
            });
        }
        else {
            clear_form();
            alert("Formato de CEP inválido.");
        }
    }
    else {

        clear_form();
    }
});
});
</script>

@endsection
