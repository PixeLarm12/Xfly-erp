@extends('Layout.template-quaternary')

@section('title', 'Adicionar Endereço')

@section('content')

<div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222">
    <div class="container" style="background-color: #F5F5F5; height: auto">

    <div class="row">

        <div class="col-12 text-center">

            <h1 class="display-4 mt-4">
                <i class="fa fa-paper-plane text-danger" aria-hidden="true"></i>
                Adicionar novo endereço
            </h1>

            <p class="lead text-center">Preencha os dados abaixo</p>

            <hr>

        </div>

    </div>

        <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">

            <form name="Addresses" action="/companies/address/store" method="POST">
                <input type="hidden" name="company_id" value="{{$companyId}}">
                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                    <label for="inputZipcode">CEP*</label>

                    <input type="text" onkeypress="return onlynumber();"  maxlength="9"
                    name="zipcode" value="{{ old('zipcode') }}" placeholder="11111-111" class="form-control" id="inputZipcode" required>

                    </div>
                   
                    <div class="form-group col-sm-3">

                        <label for="inputStreet">Rua(Adicione o número)*</label>

                        <input type="text" value="{{ old('street') }}" placeholder="Ex: Rua dos limoeiros, 1090" class="form-control" id="inputStreet" name="street" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-6">

                        <label for="inputComplement">Bairro*</label>

                        <input type="text" value="{{ old('complement') }}" placeholder=" Vila Europa" class="form-control" id="inputComplement" name="complement" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-2">

                        <label for="inputCity">Cidade*</label>

                        <input type="text" value="{{ old('city') }}" placeholder="Ex: Bauru" class="form-control" id="inputCity" name="city" required>

                    </div>

                    <div class="form-group col-sm-2">

                        <label for="inputState">Estado*</label>

                        <input type="text" value="{{ old('state') }}" placeholder="Ex: São Paulo" class="form-control" id="inputState" name="state" required>

                    </div>

                    <div class="form-group col-sm-2">

                        <label for="inputCountry">País*</label>

                        <select name="country" class="form-control" id="inputCountryA" required>

                            <option value="Alemanha">Alemanha</option>
                            <option value="Angola">Angola</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Austrália">Austrália</option>
                            <option value="Áustria">Áustria</option>
                            <option value="Bolívia">Bolívia</option>
                            <option value="Bélgica">Bélgica</option>
                            <option value="Brasil" selected="selected">Brasil</option>
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

                <div class="form-row justify-content-end">

                    <div class="col-sm-6 mb-4">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;

                        <button type="reset" class="btn btn-secondary">Limpar</button>
                        <button type="submit" class="btn btn-outline-danger">Enviar</button>

                        <br><br><br>

                    </div>

                </div>

            </form>
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

<script>
 $(document).ready(function() {


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
