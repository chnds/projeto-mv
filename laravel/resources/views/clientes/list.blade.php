<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de clientes</title>
    
    <link rel="stylesheet" href="{{asset('site/style.css')}}">
</head>
<body>
  <div class="container-fluid">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="{{route('clientes.index')}}">Clientes</a></li>
        <li class="page-item"><a class="page-link" href="{{route('produtos.index')}}">Produtos</a></li>
        <li class="page-item"><a class="page-link" href="{{route('pedidos.index')}}">Pedidos</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Descrição</th>
          <th scope="col">Valor Unitário</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clientes as $cliente)
        <tr>
          <th scope="row">{{$cliente->id}}</th>
          <td>$cliente->descricao</td>
          <td>$cliente->valor</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>   
    <script src="{{asset('site/jquery.js')}}"></script>
    <script src="{{asset('site/bootstrap.js')}}"></script>
</body>
</html>