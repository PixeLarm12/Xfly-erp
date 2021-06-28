
  @extends('Layout.template')

  @section('title', 'Cadastros')

  @section('content')

  <?php  $today = date('Y-m-d'); ?>

<div style="background-color: #181818; height: auto">

    <div class="jumbotron jumbotron-fluid " style="background-color: #B22222; height: auto">

    <div class="container" style="background-color: #F5F5F5">

      <div class="row">

        <div class="col-12 text-center">
        <br>
        @if ($errors->any())
         <div class = "alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
         </div>
        @endif

          <h1 class="display-4 mt-4">
            <i class="fa fa-paper-plane text-danger" aria-hidden="true"></i>
            Cadastros
          </h1>
          <p class="lead text-center"> Selecione o cadastro que deseja realizar</p>
          <hr>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <ul class="nav nav-pills justify-content-center mb-4" id="pills-nav" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" id="nav-pills-01" data-toggle="pill" href="#nav-item-01">
                Cadastro de Empresas
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">
                Cadastro de Drones
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="nav-pills-03" data-toggle="pill" href="#nav-item-03">
                Cadastro de Produtos
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="nav-pills-04" data-toggle="pill" href="#nav-item-04">
                Cadastro de Administradores
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="nav-pills-05" data-toggle="pill" href="#nav-item-05">
                Cadastro de Pagamento
              </a>
            </li>

          </ul>

          <div class="tab-content" id="nav-pills-content">

            <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">

            <form name="Companies" action="/companies" method="POST" enctype="multipart/form-data">
                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-6">

                        <label for="inputRS">Razão Social*</label>

                        <input type="text" value="{{ old('real_name') }}" placeholder="Ex: Empresa Fantasia LTDA." class="form-control" id="inputRS" name="real_name" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-6">

                        <label for="inputNameF">Nome Fantasia*</label>

                        <input type="text" value="{{ old('name') }}" placeholder="Ex: Empresa Fantasia" class="form-control" id="inputNameF" name="name" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputIEst">Registro Estadual (opcional) </label>

                        <input type="text" value="{{ old('state_registration') }}" data-mask="000.000.000.000" onkeypress="return onlynumber();"
                        placeholder="Ex: 000.000.000.000" class="form-control" id="inputIEst" name="state_registration">

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputIMun">Registro Municipal (opcional) </label>

                        <input type="text" value="{{ old('municipal_registration') }}" data-mask="000.000.00.00" onkeypress="return onlynumber();"
                        placeholder="Ex: 000.000.00.00" class="form-control" id="inputIMun" name="municipal_registration">

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputCNPJ">CNPJ (opcional) </label>

                        <input type="text" value="{{ old('cnpj') }}" name="cnpj" class="form-control" id="inputCnpj"
                        maxlength="18"  placeholder="Ex: 00.000.000/0000-00">

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputOwner">Responsável*</label>

                        <input type="text" value="{{ old('owner') }}" name="owner" class="form-control" placeholder="Ex: João da Silva" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-6">

                        <label for="inputEmailC">E-mail de contato*</label>

                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="inputEmailC" placeholder="Ex: empresa@gmail.com" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-6">

                        <label for="inputImagem">Escolha a imagem da empresa (opcional) </label>

                        <input type="file" name="avatar" class="form-control" id="inputImagem">

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="col-sm-2 mb-4">

                        <h2>Contato</h2>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputNameCt">Nome do contato*</label>

                        <input type="text" value="{{ old('contacts[0][name]') }}" name="contacts[0][name]" class="form-control" id="inputNomeCt" placeholder="Ex: Ricardo Gomes" required>

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputEmailCt">E-mail de contato*</label>

                        <input type="email" value="{{ old('contacts[0][email]') }}" name="contacts[0][email]" class="form-control" id="inputEmailCt" placeholder="Ex: responsavel@gmail.com" required>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-3">

                        <label for="inputDepartmentCt">Departamento*</label>

                        <input type="text" value="{{ old('contacts[0][department]') }}" name="contacts[0][department]" class="form-control" id="inputDepartmentCt" placeholder="Ex: Vendas" required>

                    </div>

                    <div class="form-group col-sm-3">

                        <label for="inputNumberCt">Número*</label>

                        <input type="text" attrname="telephone1"
                        class="form-control telefone" value="{{ old('contacts[0][number]') }}" name="contacts[0][number]" data-mask="(00)00000-0000"  id="inputNumberCt" placeholder="Ex: (14) 99999-9999" required>

                    </div>

                </div>

                 <div class="form-row justify-content-center">

                    <div class="col-sm-2 mb-4">

                        <h2>Endereço</h2>

                    </div>

                 </div>

                 <div class="form-row justify-content-center">


                     <div class="form-group col-sm-2">

                         <label for="inputZipcodeA">CEP*</label>

                         <input type="text" onkeypress="return onlynumber();"  maxlength="9"
                         value="{{ old('addresses[0][zipcode]') }}" name="addresses[0][zipcode]" class="form-control" id="inputZipcodeA" placeholder="Ex: 11111-111" required>

                     </div>

                     <div class="form-group col-sm-4">

                         <label for="inputStreetA">Rua (Adicione o número) *</label>

                         <input type="text" value="{{ old('addresses[0][street]') }}" name="addresses[0][street]" class="form-control" id="inputStreetA" placeholder="Ex: Rua: Feliz da Vida, 10-21" required>

                     </div>

                 </div>

                 <div class="form-row justify-content-center">

                     <div class="form-group col-sm-6">

                         <label for="inputComplementA">Bairro*</label>

                         <input type="text" value="{{ old('addresses[0][complement]') }}" name="addresses[0][complement]" class="form-control" id="inputComplementA" placeholder=" Ex: Vila Europa" required>

                     </div>


                 </div>

                 <div class="form-row justify-content-center">

                     <div class="form-group col-sm-2">

                         <label for="inputCityA">Cidade*</label>

                         <input type="text" value="{{ old('addresses[0][city]') }}" name="addresses[0][city]" class="form-control" id="inputCityA" placeholder="Ex: Bauru" required>

                     </div>

                     <div class="form-group col-sm-2">

                        <label for="inputStateA">Estado*</label>

                        <input type="text" value="{{ old('addresses[0][state]') }}" name="addresses[0][state]" class="form-control" id="inputStateA" placeholder="Ex: São Paulo" required>

                    </div>

                     <div class="form-group col-sm-2">

                         <label for="inputCountryA">País*</label>

                         <select value="{{ old('addresses[0][country]') }}" name="addresses[0][country]"
                          class="form-control" id="inputCountryA">

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

                        </div>

                    </div>

             </form>
            </div>

            <div class="tab-pane fade" id="nav-item-02" role="tabpanel">

            <form name="Drones" action="/drones" method="POST">

            <div class="form-row justify-content-center">

                <div class="form-group col-sm-3">

                    <label for="inputModel">Modelo*</label>

                    <div class="form-group left-inner-addon">

                        <select name="model" class="form-control" required>
                            <option value="X800 BIO" selected>X800 BIO</option>
                            <option value="X800 GEO">X800 GEO</option>
                            <option value="X800 PPK">X800 PPK</option>
                        </select>

                    </div>

                </div>

                <div class="form-group ml-2 col-sm-3">

                    <label for="inputCompanyId">Comprador*</label>

                    <div class="form-group left-inner-addon">

                        <select id="inputCompanyId" name="company_id" class="form-control" required>
                            <option value="" selected>Escolha o comprador:</option>

                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>

            </div>

            <div class="form-row justify-content-center">

                <div class="form-group mr-2 col-sm-3">

                    <label for="input">Data de compra*</label>

                    <input type="date" value="{{ $today }}" class="form-control" id="input" name="purchase_date" required>

                </div>

                <div class="form-group mr-2 col-sm-3">

                    <label for="input">Data de fabricação*</label>

                    <input type="date" class="form-control" id="input" name="production_date" required>

                </div>

            </div>

            <div class="form-row justify-content-center">

                <div class="form-group mr-2 col-sm-6">

                    <label for="input">Descrição (opcional) </label>

                    <textarea name="description" class="form-control" placeholder="Ex: Exemplo de descrição" id="inputDescriptionP" rows="4"></textarea>

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





        <div class="tab-pane fade" id="nav-item-03" role="tabpanel">

             <form name="Products" action="/products" enctype="multipart/form-data" method="POST">

                <div class="form-row justify-content-center">

                    <div class="form-group ml-2 col-sm-3">

                        <label for="inputModelP">Modelo*</label>
                        <input type="text" value="{{ old('model') }}" name="model" class="form-control" id="inputModelP" placeholder="Ex: Drone de rega" required>

                    </div>

                    <div class="form-group mr-2 col-sm-3">

                        <label for="inputPrice">Preço*</label>

                        <div class="form-group left-inner-addon">

                            <i class="fa fa-money"></i>
                            <input type="text" name="price" value="{{ old('price') }}"
                            placeholder="R$00,00" maxlength="7" onKeyPress="return(MascaraMoeda(this,'.',',',event))"
                             class="form-control" id="inputPrice"
                            required>

                        </div>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group ml-2 col-sm-3">

                        <label for="inputClient">Cliente*</label>

                        <select id="inputCompanyId" name="company_id" class="form-control" required>
                            <option value="" selected>Escolha o cliente:</option>

                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group mr-2 col-sm-3">

                        <label for="inputPrice">Imagem (opcional) </label>

                        <div class="form-group left-inner-addon">

                            <input type="file" name="image" class="form-control" id="inputImagem">

                        </div>

                    </div>

                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group ml-2 col-sm-6">

                        <label for="inputDescriptionP">Descrição (opcional) </label>

                        <textarea name="description" class="form-control" placeholder="Ex: Esse drone serve para agricultura" id="inputDescriptionP" rows="4"></textarea>
                    </div>

                </div>

                    <div class="form-row justify-content-end">

                        <div class="col-sm-6 mb-4">

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            <button type="submit" class="btn btn-outline-danger">Enviar</button>

                        </div>

                    </div>

             </form>

        </div>

            <div class="tab-pane fade" id="nav-item-04" role="tabpanel">

            <form name="Users" action="/users" method="POST">

                <div class="form-row justify-content-center">

                    <div class="form-group ml-0 col-sm-3">

                        <label for="inputName">Nome Completo*</label>

                        <div class="form-group left-inner-addon">

                            <i class="fa fa-user"></i>
                            <input type="text" name="name" class="form-control" id="inputUser" placeholder="Ex: Daniel Oliveira" required>

                        </div>

                    </div>

                    <div class="form-group mr-2 col-sm-3">

                        <label for="inputEmail">Pertence ao financeiro?*</label>
                        <div class="form-group left-inner-addon">

                            <select name="financial" class="form-control" required>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>

                    </div>

                </div>

                    <div class="form-row justify-content-center">

                        <div class="form-group ml-1 mr-2 col-sm-3">

                            <label for="inputEmail">E-mail*</label>
                            <div class="form-group left-inner-addon">

                                <i class="fa fa-envelope-o"></i>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Ex: daniel@gmail.com" required>

                            </div>

                        </div>

                        <div class="form-group mr-2 col-sm-3">

                            <label for="inputPassword">Senha*</label>

                            <div class="form-group left-inner-addon">

                                <i class="fa fa-user-o"></i>

                                <input type="password" name="password" class="form-control" id="inputPassword" required>

                            </div>

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

             <div class="tab-pane fade" id="nav-item-05" role="tabpanel">

                <form name="Payments" action="/payments" method="POST">

                    <div class="form-row justify-content-center">

                        <div class="form-group ml-2 col-sm-3">

                            <label for="inputSeller">Vendedor*</label>

                            <div class="form-group left-inner-addon">

                                <input type="text" name="seller" class="form-control" id="inputSeller" placeholder="Ex: Mercado Livre" required>

                            </div>

                        </div>

                        <div class="form-group mr-2 col-sm-3">

                            <label for="inputBuyer">Comprador*</label>

                            <div class="form-group left-inner-addon">

                                <select id="inputBuyer" name="buyer" class="form-control" required>
                                    <option value="" selected>Escolha o comprador:</option>

                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="form-row justify-content-center">

                        <div class="form-group ml-2 col-sm-2">

                            <label for="inputQtde">Quantidade*</label>

                            <div class="form-group left-inner-addon">

                                <input type="number" name="qtde" class="form-control" id="inputQtde" placeholder="Ex: 30" required>

                            </div>

                        </div>

                        <div class="form-group mr-2 col-sm-2">

                            <label for="inputItem">Item comprado*</label>
                            <div class="form-group left-inner-addon">

                                <input type="text" name="item" class="form-control" id="inputItem" placeholder="Ex: Servo motor" required>

                            </div>

                        </div>

                        <div class="form-group mr-2 col-sm-2">

                            <label for="inputPrice">Preço*</label>

                            <div class="form-group left-inner-addon">

                                <i class="fa fa-money"></i>
                                <input type="text" name="price"
                                value="{{ old('price') }}" placeholder="R$00,00" class="form-control"
                                maxlength="7"  onKeyPress="return(MascaraMoeda(this,'.',',',event))"
                                id="inputPrice" required>

                            </div>

                        </div>

                    </div>

                    <div class="form-row justify-content-center">

                        <div class="form-group ml-2 col-sm-3">

                            <label for="inputPurchaseDate">Data da compra*</label>

                            <div class="form-group left-inner-addon">

                                <input type="date" value="{{ $today }}" name="purchase_date" class="form-control" id="inputPurchaseDate" required>

                            </div>

                        </div>

                        <div class="form-group ml-2 col-sm-3">

                            <label for="inputDescription">Descrição (opcional) </label>

                            <div class="form-group left-inner-addon">

                                <textarea class="form-control" name="description" id="inputDescription"
                                placeholder="Ex: Essa compra foi efetuada com cartão de crédito"
                                rows="4"></textarea>

                            </div>

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

    </div>

  </div>

</div>
</div>

    <script>
               $(function () {
          $('[data-toggle="popover"]').popover()
        })

    </script>

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

<script >
        document.getElementById('inputCnpj').addEventListener('input', function(e) {
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

<script>
jQuery("#inputZipcodeA").mask("99999-999");
</script>

<script>
 $(document).ready(function() {


function clear_form() {
    $("#inputStreetA").val("");
    $("#inputComplementA").val("");
    $("#inputCityA").val("");
    $("#inputStateA").val("");

}

$("#inputZipcodeA").blur(function() {

    var zipcode = $(this).val().replace(/\D/g, '');


    if (zipcode!= "") {


        var validatezip = /^[0-9]{8}$/;


        if(validatezip.test(zipcode)) {

            $("#inputStreetA").val("...");
            $("#inputComplementA").val("...");
            $("#inputCityA").val("...");
            $("#inputStateA").val("...");

            $.getJSON("https://viacep.com.br/ws/"+ zipcode +"/json/?callback=?", function(data) {

                if (!("erro" in data)) {
                    $("#inputStreetA").val(data.logradouro);
                    $("#inputComplementA").val(data.bairro);
                    $("#inputCityA").val(data.localidade);
                    $("#inputStateA").val(data.uf);
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
