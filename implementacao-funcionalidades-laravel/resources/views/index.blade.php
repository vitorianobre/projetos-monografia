<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas atividades</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        section {
            margin: 0 40px ;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        section div {
            margin: 0 20px;
            padding: 3px 20px;
            border: 1px solid cadetblue;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Minhas atividades</h1>
        <a href="/cadastrar">Cadastrar atividade</a>
    </header>

    <section>
        <h2>Submetidas</h2>

        @foreach ($submetidas as $atividade)
            <div>
                <a href="{{ route('atividades.show', $atividade->id) }}">
                    <p>Ação: {{ $atividade->acao_extensao }}</p>
                    <p>Tipo: {{ $atividade->tipo ?? '-' }}</p>
                    <p>Carga horária: {{ $atividade->horas }}h</p>
                    <p>Data de submissão: {{ date('d/m/Y', strtotime($atividade->data_submissao)) }}</p>
                </a>
            </div>
        @endforeach
    </section>

    <section>
        <h2>Integralizadas</h2>

        @foreach ($integralizadas as $atividade)
            <div>
                <a href="{{ route('atividades.show', $atividade->id) }}">
                    <p>Ação: {{ $atividade->acao_extensao }}</p>
                    <p>Tipo: {{ $atividade->tipo ?? '-' }}</p>
                    <p>Carga horária: {{ $atividade->horas }}h</p>
                    <p>Data de submissão: {{ date('d/m/Y', strtotime($atividade->data_submissao)) }}</p>
                    <p>Data de aprovação: {{ date('d/m/Y', strtotime($atividade->data_avaliacao)) }}</p>
                </a>
            </div>
        @endforeach
    </section>

    <section>
        <h2>Indeferidas</h2>

        @foreach ($indeferidas as $atividade)
            <div>
                <a href="{{ route('atividades.show', $atividade->id) }}">
                    <p>Ação: {{ $atividade->acao_extensao }}</p>
                    <p>Tipo: {{ $atividade->tipo ?? '-' }}</p>
                    <p>Carga horária: {{ $atividade->horas }}h</p>
                    <p>Data de submissão: {{ date('d/m/Y', strtotime($atividade->data_submissao)) }}</p>
                </a>
            </div>
        @endforeach
    </section>
</body>
</html>
