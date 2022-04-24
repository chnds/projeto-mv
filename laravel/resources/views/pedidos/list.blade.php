<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de pedidos</title>

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
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Produtos</th>
                    <th scope="col">Número</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->nome }}</td>
                        <td>{{ $pedido->produto }}</td>
                        <td>{{ $pedido->numero }}</td>
                        <td>{{ $pedido->quantidade }}</td>
                        <td>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('pedidos.edit', $pedido->id) }}">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success cadastrar" data-toggle="modal" data-target="#exampleModal">
            Cadastrar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar pedido</h5>
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pedidos.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Cliente</label><br />
                                <select class="form-select" aria-label="Default select example" name="cliente">
                                    <option selected>Selecione o cliente</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div><br />
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Produto</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="produto"
                                    placeholder="Digite o produto"><br />
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Número</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="numero"
                                    placeholder="Digite o n° do pedido">
                            </div><br/>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Quantidade</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="quantidade"
                                    placeholder="Digite a quantidade">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".cadastrar").click(function() {
                $('#exampleModal').modal('show')
            });

            $(".close-modal").click(function() {
                $('#exampleModal').modal('hide')
            });
        });
    </script>
</body>

</html>
