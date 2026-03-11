@include('layouts.cabecalho')
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
    <style>
        /* Todos os estilos ficam dentro do container .evento-form-page */
        .evento-form-page {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .evento-form-page h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .evento-form-page .back-btn {
            max-width: 500px;
            margin: 0 auto 20px;
            text-align: left;
        }

        .evento-form-page .back-btn button {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .evento-form-page .back-btn button:hover {
            background-color: #5a6268;
        }

        .evento-form-page form {
            background-color: #fff;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .evento-form-page label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .evento-form-page input[type="text"],
        .evento-form-page input[type="date"],
        .evento-form-page input[type="time"],
        .evento-form-page input[type="file"],
        .evento-form-page select,
        .evento-form-page textarea {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .evento-form-page textarea {
            resize: vertical;
        }

        .evento-form-page button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .evento-form-page button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .evento-form-page .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .evento-form-page .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .evento-form-page .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .evento-form-page ul {
            margin: 0;
            padding-left: 20px;
        }

        .evento-form-page img {
            margin-bottom: 15px;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        @media (max-width: 480px) {
            .evento-form-page form {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="evento-form-page">
        <h2>Editar Evento</h2>
        <div class="back-btn">
            <a href="{{ route('home') }}#eventos">
                <button type="button">← Voltar para Home</button>
            </a>
        </div>

        <!-- Exibir mensagens de erro -->
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $evento->titulo) }}" required>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="3">{{ old('descricao', $evento->descricao) }}</textarea>

            <label for="data_evento">Data do Evento:</label>
            <input type="date" name="data_evento" id="data_evento"
                value="{{ old('data_evento', $evento->data_evento) }}" required>

            <label for="hora_evento">Hora do Evento:</label>
            <input type="time" name="hora_evento" id="hora_evento"
                value="{{ old('hora_evento', $evento->hora_evento) }}">

            <label for="local">Local:</label>
            <input type="text" name="local" id="local" value="{{ old('local', $evento->local) }}">

            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="ativo" {{ $evento->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="cancelado" {{ $evento->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                <option value="concluido" {{ $evento->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
            </select>

            <label for="imagem">Imagem do Evento:</label>
            @if ($evento->imagem)
                <p>Imagem atual:</p>
                <img src="{{ Storage::url($evento->imagem) }}" alt="Imagem do Evento">
            @endif
            <input type="file" name="imagem" id="imagem">

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
@include('layouts.footer')

</html>
