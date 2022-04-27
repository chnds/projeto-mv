<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mais informações</title>

    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="{{ route('clientes.index') }}">Clientes</a>
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
        <div class="p-2 text-center">
            <h1 class="mb-3 center">Mais informações sobre o cliente</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" value="Delete">Deletar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
</body>

</html>
