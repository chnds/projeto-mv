<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">

</head>

<style>
    .container-fluid {
        padding: 25px;
    }

</style>

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
                <li class="page-item active"><a class="page-link" href="{{ route('clientes.index') }}"
                        title="Listagem de clientes">Clientes</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('produtos.index') }}"
                        title="Listagem de produtos">Produtos</a>
                </li>
                <li class="page-item"><a class="page-link" href="{{ route('pedidos.index') }}"
                        title="Listagem de pedidos">Pedidos</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ route('produtos.index') }}">Next</a>
                </li>
            </ul>
        </nav>

        <div class="p-2 text-center">
            <h1 class="mb-3 center">Clientes</h1>
        </div>

        <div class="input-group input-group-sm mb-3" style="width:200px">
            <input type="text" id="myInput" placeholder="Buscar..." class="form-control" aria-label="Small"
                aria-describedby="inputGroup-sizing-sm">
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
            <tbody id="myTable">
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                <a class="btn btn-primary"
                                    href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" value="Delete">Deletar</button>
                                <a href="{{ route('clientes.show', $cliente->id) }}"
                                    class="btn btn-secondary">Info.</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success cadastrar" data-toggle="modal" data-target="#exampleModal"
            title="Cadastrar cliente">
            Cadastrar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar cliente</h5>
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('clientes.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nome</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="nome"
                                    placeholder="Digite o nome" required><br />
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">CPF</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="cpf"
                                    id="cpf" placeholder="Digite o CPF" required><br />
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">E-mail</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="email"
                                    placeholder="Digite o E-mail" required>
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

            $(".close-modal").click(function() {
                $('#exampleModal').modal('hide')
            });

            const themeSwitch = document.querySelector('input');

            themeSwitch.addEventListener('change', () => {
                document.body.classList.toggle('dark-theme');
            });

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>
