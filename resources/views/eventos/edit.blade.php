@include('layouts.cabecalho')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="admin-form-container">
    <div class="form-card">

        <div class="form-header">
            <div class="header-content">
                <a href="{{ route('home') }}#eventos" class="btn-back-link">
                    <i class="fa-solid fa-chevron-left"></i> Painel de Eventos
                </a>
                <h2><i class="fa-solid fa-pen-to-square"></i> Editar Evento</h2>
                <p>Atualize as informações exibidas para os usuários.</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="status-msg error">
                <div class="msg-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="status-msg success">
                <div class="msg-icon"><i class="fa-solid fa-circle-check"></i></div>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data"
            class="modern-form">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $evento->titulo) }}"
                    placeholder="Ex: Workshop de Tecnologia" required>
            </div>

            <div class="input-group">
                <label for="descricao">Descrição Detalhada</label>
                <textarea name="descricao" id="descricao" rows="4" placeholder="Descreva o que acontecerá no evento...">{{ old('descricao', $evento->descricao) }}</textarea>
            </div>

            <div class="row-inputs">
                <div class="input-group">
                    <label for="data_evento">Data</label>
                    <input type="date" name="data_evento" id="data_evento"
                        value="{{ old('data_evento', $evento->data_evento) }}" required>
                </div>
                <div class="input-group">
                    <label for="hora_evento">Horário</label>
                    <input type="time" name="hora_evento" id="hora_evento"
                        value="{{ old('hora_evento', $evento->hora_evento) }}">
                </div>
            </div>

            <div class="input-group">
                <label for="local">Localização</label>
                <div class="input-with-icon">
                    <i class="fa-solid fa-location-dot"></i>
                    <input type="text" name="local" id="local" value="{{ old('local', $evento->local) }}"
                        placeholder="Ex: Auditório Central ou Online">
                </div>
            </div>

            <div class="input-group">
                <label for="status">Status da Publicação</label>
                <select name="status" id="status" class="custom-select">
                    <option value="ativo" {{ $evento->status == 'ativo' ? 'selected' : '' }}>🟢 Ativo (Visível)
                    </option>
                    <option value="cancelado" {{ $evento->status == 'cancelado' ? 'selected' : '' }}>🔴 Cancelado
                    </option>
                    <option value="concluido" {{ $evento->status == 'concluido' ? 'selected' : '' }}>🔵 Concluído
                    </option>
                </select>
            </div>

            <div class="input-group">
                <label>Mídia do Evento</label>
                <div class="media-upload-area">
                    @if ($evento->imagem)
                        <div class="current-image-preview">
                            <img src="{{ Storage::url($evento->imagem) }}" alt="Preview">
                            <span>Imagem atual</span>
                        </div>
                    @endif
                    <div class="file-input-wrapper">
                        <input type="file" name="imagem" id="imagem">
                        <p class="file-hint">Formatos aceitos: JPG, PNG. Recomendado: 800x450px</p>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-floppy-disk"></i> Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Configurações Gerais */
    .admin-form-container {
        background-color: #f0f2f5;
        padding: 60px 20px;
        min-height: 90vh;
        font-family: 'Inter', system-ui, sans-serif;
    }

    .form-card {
        max-width: 650px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    /* Header */
    .form-header {
        background: #fff;
        padding: 30px 40px 20px;
        border-bottom: 1px solid #f0f0f0;
    }

    .btn-back-link {
        color: #64748b;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 15px;
        transition: 0.2s;
    }

    .btn-back-link:hover {
        color: #2563eb;
    }

    .form-header h2 {
        margin: 0;
        color: #1e293b;
        font-size: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-header p {
        color: #94a3b8;
        margin: 5px 0 0 0;
        font-size: 14px;
    }

    /* Formulário */
    .modern-form {
        padding: 30px 40px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-group input,
    .input-group textarea,
    .input-group select {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f8fafc;
    }

    .input-group input:focus,
    .input-group textarea:focus {
        outline: none;
        border-color: #2563eb;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .row-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .input-with-icon {
        position: relative;
    }

    .input-with-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .input-with-icon input {
        padding-left: 40px;
    }

    /* Mídia Preview */
    .media-upload-area {
        background: #f1f5f9;
        padding: 20px;
        border-radius: 12px;
        border: 2px dashed #cbd5e1;
    }

    .current-image-preview {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
        background: #fff;
        padding: 10px;
        border-radius: 8px;
    }

    .current-image-preview img {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 4px;
    }

    .current-image-preview span {
        font-size: 12px;
        color: #64748b;
    }

    .file-hint {
        font-size: 12px;
        color: #94a3b8;
        margin-top: 8px;
    }

    /* Botões */
    .form-footer {
        margin-top: 30px;
        border-top: 1px solid #f0f0f0;
        padding-top: 30px;
    }

    .btn-submit {
        width: 100%;
        background: #2563eb;
        color: white;
        border: none;
        padding: 15px;
        font-size: 16px;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
    }

    /* Mensagens de Alerta */
    .status-msg {
        margin: 20px 40px 0;
        padding: 15px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .status-msg.error {
        background: #fef2f2;
        border-left: 4px solid #ef4444;
        color: #991b1b;
    }

    .status-msg.success {
        background: #f0fdf4;
        border-left: 4px solid #22c55e;
        color: #166534;
    }

    .status-msg ul {
        margin: 0;
        padding-left: 20px;
        font-size: 14px;
    }

    /* Responsivo */
    @media (max-width: 600px) {
        .row-inputs {
            grid-template-columns: 1fr;
        }

        .modern-form {
            padding: 20px;
        }

        .form-header {
            padding: 20px;
        }
    }
</style>

@include('layouts.footer')
