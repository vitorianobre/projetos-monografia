<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Contato</title>
    </head>
    <body>
        <h1>Editar Contato</h1>

        <form action="/contatos/{{ $contato->id }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nome" value="{{ $contato->nome }}" placeholder="Nome">
            <input type="text" name="telefone" value="{{ $contato->telefone }}" placeholder="Telefone">
            <button type="submit">Salvar Alterações</button>
        </form>
    </body>
    </html>
