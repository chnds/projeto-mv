<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar cliente</title>

    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
</head>

<style>
    .container-fluid{
        padding: 25px;
    }
</style>

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
                <li class="page-item active"><a class="page-link" href="{{ route('pedidos.index') }}">Pedidos</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ route('produtos.index') }}">Next</a>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="p-2 text-center">
                <h1 class="mb-3 center">Atualizar informações de pedido</h1>
            </div>

            <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="formGroupExampleInput">Cliente</label><br />
                    <select class="form-select" aria-label="Default select example" name="cliente" required>
                        <option selected></option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div><br />
                <div class="form-group">
                    <label for="formGroupExampleInput2">Produto</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="produto"
                        placeholder="Digite o produto" value="{{ $pedido->produto }}" required><br />
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">Número</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="numero"
                        placeholder="Digite o n° do pedido" value="{{ $pedido->numero }}" required>
                </div><br />

                <div class="form-group">
                    <label for="formGroupExampleInput2">Quantidade</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="quantidade"
                        placeholder="Digite a quantidade" value="{{ $pedido->quantidade }}" required>
                </div><br />

                <div class="form-group">
                    <label for="formGroupExampleInput">status</label>
                    <select class="form-select" aria-label="Default select example" name="status" required>
                        <option selected></option>
                            <option value="Em aberto">Em aberto</option>
                            <option value="Pago">Pago</option>
                            <option value="Cancelado">Cancelado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:25px">Atualizar</button>

            </form>

        </div>



    </div>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>

</body>

</html>
