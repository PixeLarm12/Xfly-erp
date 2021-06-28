@extends('Layout.template-secondary')

@section('title', 'Relatórios - Serviços')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">
            <i class="fa fa-home text-danger" aria-hidden="true"></i>
            SERVIÇOS</h1>
            <p class="lead">Relatórios</p>

        </div>

    </div>
    <center>
    <div class="form-row justify-content-center">

        <div class="form-group col-sm-3">

            <label for="inputModel">Relatório por data de compra</label>

            <div class="form-group left-inner-addon">

                <a href="/services/reportSoldAtServices/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>

        <div class="form-group col-sm-3">

            <label for="inputModel">Relatório por tipo de serviço</label>

            <div class="form-group left-inner-addon">

                <a href="/services/reportServiceTypeServices/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>

    </div>
    <div class="form-row justify-content-center">

        <div class="form-group col-sm-3">

            <label for="inputModel" class=" mr-3">Relatório por cliente</label>

            <div class="form-group left-inner-addon">

                <a href="/services/reportIdCompanyServices/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>

        <div class="form-group col-sm-3">

            <label for="inputModel" class=" mr-3">Relatório de tudo</label>

            <div class="form-group left-inner-addon">

                <a href="/services/reportAllServices/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>
        <center>
    </div>

</div>

@endsection
