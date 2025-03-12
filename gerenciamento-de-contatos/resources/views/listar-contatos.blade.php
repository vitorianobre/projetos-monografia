<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <form action="/contatos" method="POST">
        @csrf
        <input type="text" name='nome' placeholder="Nome">
        <input type="text" name="telefone" id="telefone" placeholder="Telefone">
        <button type="submit">Enviar</button>
    </form>

    <ul>
        @foreach ($contatos as $contato)
        <li>
            {{ $contato->nome }} - {{ $contato->telefone }}
            <a href="/contatos/{{ $contato->id }}/edit">Editar</a>

            <form action="/contatos/{{ $contato->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>
