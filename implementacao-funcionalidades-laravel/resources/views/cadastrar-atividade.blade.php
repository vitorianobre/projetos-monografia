<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar atividade</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cadastrar-atividade.css') }}">
    <style>
        #container-tipo-curso, #container-tipo-evento {
            display: none;
        }

        .required {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Nova atividade</h1>
        <a href="/">Minhas Atividades</a>
    </header>
    <form action="{{ route('atividades.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="acao-extensao">Selecione a ação de extensão<span class="required">*</span></label>
            <select name="acao_extensao" id="acao-extensao" required>
                <option value="" selected disabled>Selecione</option>
                <option value="Programa">Programa</option>
                <option value="Projeto">Projeto</option>
                <option value="Curso">Curso</option>
                <option value="Evento">Evento</option>
            </select>
        </div>

        <div id="container-tipo-curso">
            <label for="tipo-curso">Selecione o tipo<span class="required">*</span></label>
            <select name="tipo-curso" id="tipo-curso">
                <option value="" selected disabled>Selecione</option>
                <option value="Formação inicial">Formação inicial</option>
                <option value="Formação continuada">Formação continuada</option>
            </select>
        </div>

        <div id="container-tipo-evento">
            <label for="tipo-evento">Selecione o tipo<span class="required">*</span></label>
            <select name="tipo-evento" id="tipo-evento">
                <option value="" selected disabled>Selecione</option>
                <option value="Congresso">Congresso</option>
                <option value="Seminário">Seminário</option>
                <option value="Encontro">Encontro</option>
                <option value="Simpósio">Simpósio</option>
                <option value="Jornada">Jornada</option>
                <option value="Colóquio">Colóquio</option>
                <option value="Fórum">Fórum</option>
                <option value="Minicurso">Minicurso</option>
                <option value="Ciclo de Debates e Semana">Ciclo de Debates e Semana</option>
            </select>
        </div>

        <div>
            <label for="horas">Horas pleiteadas<span class="required">*</span></label>
            <input type="number" name="horas" id="horas" required>
        </div>

        <div>
            <label for="anexo">Anexos<span class="required">*</span></label>
            <input type="file" name="anexo" id="anexo" accept=".pdf" required>
        </div>

        <button type="submit">Adicionar atividade</button>
    </form>


    <script>
        const acaoExtensao = document.getElementById('acao-extensao');
        const containerTipoCurso = document.getElementById('container-tipo-curso');
        const containerTipoEvento = document.getElementById('container-tipo-evento');
        const tipoCurso = document.getElementById('tipo-curso');
        const tipoEvento = document.getElementById('tipo-evento');

        acaoExtensao.addEventListener('change', ()=>{
            if(acaoExtensao.value === 'Curso') {
                containerTipoCurso.style.display = 'block';
                tipoCurso.setAttribute('required', true);
            } else {
                containerTipoCurso.style.display = 'none';
                tipoCurso.removeAttribute('required');
            }
        })

        acaoExtensao.addEventListener('change', ()=>{
            if(acaoExtensao.value === 'Evento') {
                containerTipoEvento.style.display = 'block';
                tipoEvento.setAttribute('required', true);
            } else {
                containerTipoEvento.style.display = 'none';
                tipoEvento.removeAttribute('required');
            }
        })

        const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB
        const fileInput = document.getElementById('anexo');

        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            if (file && file.size > MAX_FILE_SIZE) {
                alert('O arquivo deve ter no máximo 5MB.');
                fileInput.value = '';
            }
        });
    </script>
</body>
</html>
