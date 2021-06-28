@extends('Layout.template-secondary')

@section('title', 'Entrar')

@section('content')

<div class="container ml-0" style="max-width: none">
        <div class="row bg-danger">
        

            <div class="col-12 col-bg-6 text-center justify-content-center" style="height: 88vh; padding-top: 11%">
                <center>
                        
                    <h2 class="mt-5 mb-4 text-light">
                    <i class="fa fa-list-alt"></i>
                    Escolha o drone e digite seu lembrete</h2>
                
                    <br>
                    <form class="mb-5" method="POST" action="/login">
                        <div class="form-row" style="justify-content: center">
                        <div class=" form-group col-sm-4">
                            <select class="form-control" style=" width: 400px"> 
                            </select>
                            </div>
                        
                        
                         <div class=" form-group col-sm-4">
                              <textarea class="form-control" style=" width: 400px" name="description" id="inputDescription"
                                placeholder="Ex: Trocar telemetria"
                                rows="4"></textarea>
                            </div>
                        </div>
                         <div class="form-row mt-4 justify-content-center" >
                            <div class=" form-group col-sm-12">
                                <input type="button" class="btn btn-success" style="border-radius: 20px; float:center;" value="Salvar">
                            </div>
                        </div>
                    </form>
                    
                <br><br><br>

                </center>
            </div>
        </div>
    </div>

    
</div>
   
  
@endsection