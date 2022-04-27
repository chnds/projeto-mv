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
                <li class="page-item active"><a class="page-link" href="{{ route('produtos.index') }}">Produtos</a>
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
                <h1 class="mb-3 center">Atualizar informações do produto</h1>
            </div>

            <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="form-group">
                    <label for="formGroupExampleInput">Descrição</label>
                    <input type="text" class="form-control col-xs-4" id="formGroupExampleInput" name="descricao"
                        placeholder="Digite a descrição" value="{{ $produto->descricao }}" required><br />
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">Valor unitário</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="valor"
                        placeholder="Digite o valor do produto" value="{{ $produto->valor }}" required><br />
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:25px">Atualizar</button>
            </form>
        </div>

    </div>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>

</body>

</html>
