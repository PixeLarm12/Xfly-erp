@extends('Layout.template-terciary')

@section('title', 'Relatório')

@section('content')

    <div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222; height:auto">

    <div class="container" style="background-color: #F5F5F5; height: 100vh">

        <div class="row">

            <div class="col-12 text-center">

                <h1 class="display-4 mt-4">
                    <i class="fa fa-search text-danger" aria-hidden="true"></i>
                    Selecionar
                </h1>

                <p class="lead text-center">Selecione o tipo de arquivo para gerar relatório</p>

                <hr>

            </div>

        </div>

    <div class="row">

        <div class="col-12">

            <div style="display: flex; justify-content: center;">

                <form class="w-50" action="/services/reportAllServices/report" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Selecionar dados</div>

                        <div class="form-group col-sm-8">
                            <b>Selecione a melhor opção para gerar relatório</b>
                            <select name="report_option" class="form-control" required>
                                <option value="PDF" selected>PDF</option>
                                <option value="EXCEL">Excel</option>
                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <input type="submit" value="Pesquisar" class="btn btn-success" id="inputEmail">

                        </div>

                    </div>

                </form>

        </div>

    </div>

    </div>

    </div>
</div>

@endsection
