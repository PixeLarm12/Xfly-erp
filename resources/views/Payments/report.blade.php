@extends('Layout.template-secondary')

@section('title', 'Relatórios - Serviços')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-12 text-center my-5">

            <h1 class="display-1">
            <i class="fa fa-home text-danger" aria-hidden="true"></i>
            PAGAMENTOS</h1>
            <p class="lead">Relatórios</p>

        </div>

    </div>
<center>
    <div class="form-row justify-content-center">

        <div class="form-group col-sm-3">

            <label for="inputModel">Relatório por Administrador</label>

            <div class="form-group left-inner-addon">

                <a href="/payments/reportBuyerPayments/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>

        <div class="form-group col-sm-3">

            <label for="inputModel">Relatório por data</label>

            <div class="form-group left-inner-addon">

                <a href="/payments/reportCreatedAtPayments/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>

        <div class="form-group col-sm-3">

            <label for="inputModel">Relatório por Admin e data</label>

            <div class="form-group left-inner-addon">

                <a href="/payments/reportAdminsAndDate/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>

        <div class="form-group col-sm-3">

            <label for="inputModel">Relatório de tudo</label>

            <div class="form-group left-inner-addon">

                <a href="/payments/reportAllPayments/view">
                    <button class="btn btn-success mr-4"> Gerar relatório </button>
                </a>

            </div>

        </div>

    </div>

</div>
<center>
@endsection
