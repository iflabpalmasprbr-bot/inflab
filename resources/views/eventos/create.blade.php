@include('layouts.cabecalho')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="admin-form-container">
    <div class="form-card">

        <div class="form-header">
            <div class="header-content">
                <a href="{{ route('home') }}#eventos" class="btn-back-link">
                    <i class="fa-solid fa-chevron-left"></i> Voltar para a vitrine
                </a>
                <h2><i class="fa-solid fa-calendar-plus"></i> Novo Evento</h2>
                <p>Preencha os detalhes abaixo para criar um novo evento no sistema.</p>
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

        <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data" class="modern-form">
            @csrf

            <div class="input-group">
                <label for="titulo">Título do Evento</label>
                <input type="text" name="titulo" id="titulo" placeholder="Ex: Conferência Anual de Inovação"
                    value="{{ old('titulo') }}" required>
            </div>

            <div class="input-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4"
                    placeholder="O que os participantes podem esperar deste evento?">{{ old('descricao') }}</textarea>
            </div>

            <div class="row-inputs">
                <div class="input-group">
                    <label for="data_evento">Data de Realização</label>
                    <input type="date" name="data_evento" id="data_evento" value="{{ old('data_evento') }}" required>
                </div>
                <div class="input-group">
                    <label for="hora_evento">Horário de Início</label>
                    <input type="time" name="hora_evento" id="hora_evento" value="{{ old('hora_evento') }}">
                </div>
            </div>

            <div class="input-group">
                <label for="local">Local ou Link (Se Online)</label>
                <div class="input-with-icon">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <input type="text" name="local" id="local" value="{{ old('local') }}"
                        placeholder="Ex: Campus Central - Bloco A">
                </div>
            </div>

            <div class="input-group">
                <label for="status">Status Inicial</label>
                <select name="status" id="status" class="custom-select">
                    <option value="ativo" selected>🟢 Ativo (Publicar agora)</option>
                    <option value="cancelado">🔴 Cancelado</option>
                    <option value="concluido">🔵 Concluído</option>
                </select>
            </div>

            <div class="input-group">
                <label>Capa do Evento</label>
                <div class="media-upload-area">
                    <div class="upload-placeholder">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Clique ou arraste a imagem para upload</p>
                    </div>
                    <input type="file" name="imagem" id="imagem" class="file-input-hidden">
                    <p class="file-hint">JPG ou PNG (Máx. 2MB)</p>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-rocket"></i> Publicar Evento
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Variáveis e Reset */
    :root {
        --brand-color: #2563eb;
        --brand-hover: #1d4ed8;
        --bg-body: #f1f5f9;
        --text-dark: #1e293b;
        --text-light: #64748b;
    }

    .admin-form-container {
        background-color: var(--bg-body);
        padding: 50px 20px;
        min-height: 100vh;
        font-family: 'Inter', -apple-system, sans-serif;
    }

    .form-card {
        max-width: 650px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    /* Header */
    .form-header {
        padding: 30px 40px 15px;
        border-bottom: 1px solid #f1f5f9;
    }

    .btn-back-link {
        color: var(--text-light);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 10px;
    }

    .btn-back-link:hover {
        color: var(--brand-color);
    }

    .form-header h2 {
        margin: 0;
        font-size: 22px;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-header p {
        color: var(--text-light);
        font-size: 14px;
        margin-top: 5px;
    }

    /* Form Body */
    .modern-form {
        padding: 30px 40px;
    }

    .input-group {
        margin-bottom: 18px;
    }

    .input-group label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .input-group input,
    .input-group textarea,
    .input-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 6px;
        font-size: 14px;
        transition: 0.2s;
        background: #fff;
    }

    .input-group input:focus {
        border-color: var(--brand-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        outline: none;
    }

    .row-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    /* Icon Input */
    .input-with-icon {
        position: relative;
    }

    .input-with-icon i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .input-with-icon input {
        padding-left: 35px;
    }

    /* Upload Area */
    .media-upload-area {
        border: 2px dashed #cbd5e1;
        background: #f8fafc;
        padding: 25px;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: 0.2s;
    }

    .media-upload-area:hover {
        background: #f1f5f9;
        border-color: var(--brand-color);
    }

    .upload-placeholder i {
        font-size: 32px;
        color: var(--brand-color);
        margin-bottom: 8px;
    }

    .upload-placeholder p {
        font-size: 14px;
        color: var(--text-dark);
        margin: 0;
    }

    .file-hint {
        font-size: 11px;
        color: var(--text-light);
        margin-top: 10px;
    }

    /* Botão Final */
    .form-footer {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #f1f5f9;
    }

    .btn-submit {
        width: 100%;
        background: var(--brand-color);
        color: white;
        border: none;
        padding: 14px;
        font-size: 15px;
        font-weight: 700;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: 0.2s;
    }

    .btn-submit:hover {
        background: var(--brand-hover);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }

    /* Alerts */
    .status-msg.error {
        margin: 20px 40px 0;
        background: #fef2f2;
        border-radius: 6px;
        padding: 12px;
        color: #991b1b;
        display: flex;
        gap: 12px;
        font-size: 13px;
        border-left: 4px solid #ef4444;
    }

    .status-msg ul {
        margin: 0;
        padding-left: 15px;
    }

    /* Responsivo */
    @media (max-width: 500px) {
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
