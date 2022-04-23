<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de clientes</title>

    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('clientes.create') }}">Cadastrar
                        clientes</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('produtos.create') }}">Cadastrar
                        produtos</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('pedidos.create') }}">Cadastrar
                        pedidos</a></li>
                <li class="page-item">
                    <a class="page-link" href="{{ route('produtos.create') }}">Next</a>
                </li>
            </ul>
        </nav>

    </div>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
</body>

</html>
