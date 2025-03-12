<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        .link-voltar {
            position: absolute;
            top: 40px;
            right: 40px;
        }

        body {
            padding: 20px 30px;
        }
    </style>
</head>
<body>
    <a href="/">Voltar</a>

    <h1>Ação: {{ $atividade->acao_extensao }}</h1>
    <p>Tipo: {{ $atividade->tipo ?? '-' }}</p>
    <p>Carga horária: {{ $atividade->horas }}h</p>
    <p>Data de submissão: {{ date('d/m/Y', strtotime($atividade->data_submissao)) }}</p>
    <p>Situação: {{ $atividade->situacao }}</p>
    <p>Data de aprovação: {{ date('d/m/Y', strtotime($atividade->data_avaliacao)) ?? '-' }}</p>
    @if ($atividade->anexo)
        <p>
            Anexos: <a href="{{ route('atividade.download', $atividade->id) }}">Baixar Anexo</a>
        </p>
    @endif
</body>
</html>
