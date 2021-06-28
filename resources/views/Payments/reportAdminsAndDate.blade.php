@extends('Layout.template-terciary')

@section('title', 'Relatório')

@section('content')

<?php $today = date('Y-m-d'); ?>

    <div class="w-auto d-flex flex-wrap align-items-center" style="background-color: #B22222">

    <div class="container" style="background-color: #F5F5F5; height: 100vh">

        <div class="row">

            <div class="col-12 text-center">

                <h1 class="display-4 mt-4">
                    <i class="fa fa-search text-danger" aria-hidden="true"></i>
                    Pesquisar
                </h1>

                <p class="lead text-center">Pesquise os dados para gerar relatório</p>

                <hr>

            </div>

        </div>

    <div class="row">

        <div class="col-12">

            <div style="display: flex; justify-content: center;">

                <form class="w-50" action="/payments/reportAdminsAndDate/report" method="post">

                    <div class="form-row justify-content-center">

                        <div class="text-center table">Pesquisar dados</div>

                        <div class="form-group col-sm-8">

                            <select name="buyer" class="form-control" required>
                                <option value="" selected>Escolha o comprador:</option>

                                @foreach ($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data inicial</label>

                            <input type="date" class="form-control" name="date_initial" id="inputName">

                        </div>

                        <div class="form-group col-sm-8">

                            <label for="inputType">Data final</label>

                            <input type="date" value="{{ $today }}" name="date_final" class="form-control" id="inputEmail">

                        </div>

                        <div class="form-group col-sm-8">

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
