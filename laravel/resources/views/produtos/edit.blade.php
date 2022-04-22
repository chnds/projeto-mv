<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar um produto cadastrado</title>
</head>
<body>
    <form action="{{route('registrar_produto')}}" method="POST">
        @csrf
        <label for="">Descrição</label></br>
        <input type="text" name="descricao"></br>

        <label for="">Valor</label></br>
        <input type="text" name="valor"></br>

        <button>Salvar</button>
    </form>
</body>
</html>