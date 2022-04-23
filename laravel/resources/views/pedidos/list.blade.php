<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de pedidos</title>
    
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
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pedidos as $pedido)
        <tr>
          <th scope="row">{{$pedido->id}}</th>
          <td>$pedido->descricao</td>
          <td>$pedido->valor</td>
          <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>   
    <script src="{{asset('site/jquery.js')}}"></script>
    <script src="{{asset('site/bootstrap.js')}}"></script>
</body>
</html>