<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de pedidos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
</head>

<body>

    <div class="container-fluid">
        Light/dark(Beta)
        <label class="switch">
            <i class="fas fa-adjust"></i>
            <div>

                <input type="checkbox" />
                <span class="slider round"></span>
            </div>

        </label>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('clientes.index') }}"
                        title="Listagem de clientes">Clientes</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('produtos.index') }}"
                        title="Listagem de produtos">Produtos</a>
                </li>
                <li class="page-item active"><a class="page-link" href="{{ route('pedidos.index') }}"
                        title="Listagem de pedidos">Pedidos</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>

        </nav>
        <div class="p-2 text-center">
            <h1 class="mb-3 center">Pedidos</h1>
        </div>

        <div class="input-group input-group-sm mb-3" style="width:200px">
            <input type="text" id="myInput" placeholder="Buscar..." class="form-control" aria-label="Small"
                aria-describedby="inputGroup-sizing-sm">
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Produtos</th>
                    <th scope="col">Número</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                    <th scope="col">Seleção</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>
                            {{ $pedido->nome }} <a class="btn"
                                href="{{ route('clientes.show', $pedido->cliente) }}"><i
                                    class="fas fa-info-circle fa-xs"></i></a>
                        </td>
                        <td>
                            {{ $pedido->descricao }} <a class="btn"
                                href="{{ route('produtos.show', $pedido->produto) }}"><i
                                    class="fas fa-info-circle fa-xs"></i></a>
                        </td>
                        <td>{{ $pedido->numero }}</td>
                        <td>{{ $pedido->quantidade }}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('pedidos.edit', $pedido->id) }}">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                                <a href="{{ route('pedidos.show', $pedido->id) }}"
                                    class="btn btn-secondary">Info.</a>
                            </form>
                        </td>
                        <td><input type="checkbox" name="idPedido" class="idPedido"
                                value="{{ $pedido->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success cadastrar" data-toggle="modal" data-target="#exampleModal"
            title="Cadastrar pedido">
            Cadastrar
        </button>

        <button type="button" class="btn btn-danger excluirItens" style="display:none">Excluir itens
            selecionados</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar pedido</h5>
                        <button type="button" class="btn close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pedidos.store') }}" method="POST">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="modal-body">
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
                                <label for="formGroupExampleInput">Produto</label><br />
                                <select class="form-select" aria-label="Default select example" name="produto">
                                    <option selected>Selecione o produto</option>
                                    @foreach ($produtos as $produto)
                                        <option value="{{ $produto->id }}">{{ $produto->descricao }}</option>
                                    @endforeach
                                </select>
                            </div><br />
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Número</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="numero"
                                    placeholder="Digite o n° do pedido" required>
                            </div><br />
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Quantidade</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="quantidade"
                                    placeholder="Digite a quantidade" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-modal"
                                data-dismiss="modal">Fechar</button>
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

            $(".btn_cliente").click(function() {
                $('#exampleModal2').modal('show')
            });

            $(".close-modal").click(function() {
                $('#exampleModal').modal('hide')
            });

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            const themeSwitch = document.querySelector('input');

            themeSwitch.addEventListener('change', () => {
                document.body.classList.toggle('dark-theme');
            });

            var valores = [];

            $(".idPedido").change(function() {
                $(".excluirItens").removeAttr('style');

                if ($(this).is(':checked')) {
                    valores.push($(this).closest('tr').find('input[type=checkbox]').val());
                    console.log(valores);
                } else {
                    valores.pop($('.idPedido').val());
                    console.log(valores);
                }

            })

            $(".excluirItens").click(function() {
                if (confirm("Deseja realmente excluir o pedidos selecionados ?")) {

                    $.ajax({
                        type: 'POST',
                        url: '/excluirPedidos',
                        dataType: 'json',
                        data: {
                            valores,
                            _token: $('#token').val(),
                        },
                        success: function(data) {
                            alert('Pedidos excluídos com sucesso');
                            location.reload();
                        },
                        error: function(data) {
                            alert('Houve um erro com a sua solicitação');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
