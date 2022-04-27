<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        Light/dark(Beta)
        <!--Dark/light-->
        <label class="switch">
            <i class="fas fa-adjust"></i>
            <div>
                <input type="checkbox" />
                <span class="slider round"></span>
            </div>
        </label>

        <nav aria-label="Page navigation example">
            <!---NavBar-->
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('clientes.index') }}"
                        title="Listagem de clientes">Clientes</a>
                </li>
                <li class="page-item active"><a class="page-link" href="{{ route('produtos.index') }}"
                        title="Listagem de produtos">Produtos</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('pedidos.index') }}"
                        title="Listagem de pedidos">Pedidos</a></li>
                <li class="page-item">
                    <a class="page-link" href="{{ route('pedidos.index') }}">Next</a>
                </li>
            </ul>
        </nav>
        <div class="p-2 text-center">
            <h1 class="mb-3 center">Produtos</h1>
        </div>

        <div class="input-group input-group-sm mb-3" style="width:200px">
            <!--Filtro de busca-->
            <input type="text" id="buscar-informacao" placeholder="Buscar..." class="form-control" aria-label="Small"
                aria-describedby="inputGroup-sizing-sm">
        </div>

        <table class="table">
            <!--Tabela de listagem-->
            <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Ações</th>
                    <th scope="col">Seleção</th>
                </tr>
            </thead>
            <tbody id="tabela-produtos">
                @foreach ($produtos as $produto)
                    <tr>
                        <td> <a href="{{ route('produtos.show', $produto->id) }}">{{ $produto->descricao }}</a></td>
                        <td>R${{ $produto->valor }}</td>
                        <td>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <a class="btn btn-primary"
                                    href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                                <a href="{{ route('produtos.show', $produto->id) }}"
                                    class="btn btn-secondary">Info.</a>
                            </form>
                        </td>
                        <td><input type="checkbox" name="idProduto" class="id-produto"
                                value="{{ $produto->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Abir modal cadastrar produto -->
        <button type="button" class="btn btn-success cadastrar" data-toggle="modal" data-target="#exampleModal"
            title="Cadastrar produto">
            Cadastrar
        </button>

        <!-- Excluir selecão em massa -->
        <button type="button" class="btn btn-danger excluir-itens" style="display:none">Excluir itens
            selecionados</button>


        <!-- Modal com formulário p/ cadastro -->
        <div class="modal fade" id="modal-produtos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar produtos</h5>
                        <button type="button" class="btn close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('produtos.store') }}" method="POST">

                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Descrição</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="descricao"
                                    placeholder="Digite a descrição do produto" required><br />
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Valor unitário</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="valor"
                                    placeholder="Digite o valor unitário" required><br />
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
            $(".cadastrar").click(function() { //Abrir modal
                $('#modal-produtos').modal('show')
            });

            $(".close-modal").click(function() { //Fechar modal
                $('#modal-produtos').modal('hide')
            });

            const themeSwitch = document.querySelector('input');

            themeSwitch.addEventListener('change', () => {
                document.body.classList.toggle('dark-theme');
            });
        });

        $("#buscar-informacao").on("keyup", function() { //Filtro de busca
            var value = $(this).val().toLowerCase();
            $("#tabela-produtos tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        var valores = [];

        $(".id-produto").change(function() { //Capturar ID's dos itens selecionados 
            $(".excluir-itens").removeAttr('style');

            if ($(this).is(':checked')) {
                valores.push($(this).closest('tr').find('input[type=checkbox]').val());
                console.log(valores);
            } else {
                valores.pop($('.id-produto').val());
                console.log(valores);
            }

        })

        $(".excluir-itens").click(function() { //Ajax exclusão dos itens
            if (confirm("Deseja realmente excluir o produtos selecionados ?")) {

                $.ajax({
                    type: 'POST',
                    url: '/excluirProdutos',
                    dataType: 'json',
                    data: {
                        valores,
                        _token: $('#token').val(),
                    },
                    success: function(data) {
                        alert('Produtos excluídos com sucesso');
                        location.reload();
                    },
                    error: function(data) {
                        alert('Houve um erro com a sua solicitação');
                    }
                });
            }
        });
    </script>
</body>

</html>
