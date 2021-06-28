<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">

    <title> Mostrando Empresas Deletadas </title>

</head>
<body>

    <ul>

        @foreach($companies as $company)

            <li>

                <a href="/companies/{{ $company->id }}/restore"> {{ $company->name }} </a>

            </li>

        @endforeach

    </ul>

</body>
</html>
