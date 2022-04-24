<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar cliente</title>

    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('produtos.index') }}">Produtos</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('pedidos.index') }}">Pedidos</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ route('produtos.index') }}">Next</a>
                </li>
            </ul>
        </nav>
        <div class="container">
        <div class="p-2 text-center">
            <h1 class="mb-3 center">Atualizar informações</h1>
        </div>

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" class="form-control col-xs-4" id="formGroupExampleInput" name="nome"
                    placeholder="Digite o nome" value="{{ $cliente->nome }}"><br />
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">CPF</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="cpf"
                    placeholder="Digite o CPF" value="{{ $cliente->cpf }}"><br />
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">E-mail</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="email"
                    placeholder="Digite o E-mail" value="{{ $cliente->email }}">
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top:25px">Atualizar</button>

    </div>

    </form>

    </div>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>

</body>

</html>
