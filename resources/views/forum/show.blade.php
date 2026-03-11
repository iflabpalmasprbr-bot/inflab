@include('layouts.cabecalho')

<style>
    body {
        background: #f0f2f5;
        font-family: 'Inter', sans-serif;
    }

    .forum-container {
        max-width: 900px;
        margin: 20px auto;
        padding: 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .btn-voltar {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #2563eb;
        color: #ffffff;
        padding: 6px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        transition: all 0.2s ease-in-out;
        border: 1px solid #1d4ed8;
        margin-bottom: 12px;
        align-self: flex-start;
    }

    .btn-voltar:hover {
        background: #1d4ed8;
        transform: translateX(-4px);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
    }

    .btn-voltar svg {
        width: 16px;
        height: 16px;
        stroke: #ffffff;
    }

    .topico-titulo {
        font-size: 2.4rem;
        font-weight: 800;
        color: #1d4ed8;
        margin: 0;
        padding-bottom: 4px;
        letter-spacing: -0.5px;
        text-align: center;
        width: 100%;
    }

    .topico-titulo::after {
        content: "";
        display: block;
        width: 120px;
        height: 5px;
        margin: 6px auto 0 auto;
        background: linear-gradient(90deg, #3b82f6, #1d4ed8);
        border-radius: 4px;
        box-shadow: 0 0 8px rgba(29, 78, 216, 0.4);
    }

    .topico-descricao {
        font-size: 1.15rem;
        color: #4b5563;
        margin: 4px 0 12px 0;
        text-align: center;
    }

    .divider {
        margin: 30px 0;
        border-top: 2px solid #e5e7eb;
        width: 100%;
    }

    .chat-wrapper {
        width: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 20px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e5e7eb;
    }

    .conversas-box {
        padding: 25px;
        max-height: 450px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #3b82f6 #e5e7eb;
        width: 100%;
        border-bottom: 1px solid #e5e7eb;
    }

    .conversas-box::-webkit-scrollbar {
        width: 8px;
    }

    .conversas-box::-webkit-scrollbar-track {
        background: #e5e7eb;
        border-radius: 10px;
    }

    .conversas-box::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 10px;
    }

    .conversas-box::-webkit-scrollbar-thumb:hover {
        background: #1d4ed8;
    }

    .conversa-card {
        background: #f9fafb;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 12px;
        transition: all .2s ease-in-out;
        border: 1px solid #e5e7eb;
    }

    .conversa-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.06);
    }

    .conversa-meta {
        margin-top: 6px;
        color: #6b7280;
        font-size: .85rem;
    }

    .form-box {
        padding: 20px 25px;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .form-box h4 {
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 6px;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .input-label {
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #d1d5db;
        font-size: 1rem;
        width: 100%;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    /* Botão Enviar mais desgrudado */
    .btn-enviar {
        align-self: flex-end;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        border: none;
        padding: 12px 28px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 12px;
        color: #fff;
        cursor: pointer;
        transition: all .2s ease-in-out;
        margin-top: 12px;
        /* ADICIONADO: espaço entre textarea e botão */
    }

    .btn-enviar:hover {
        background: linear-gradient(135deg, #1d4ed8, #1e40af);
        transform: translateY(-1px);
    }

    .btn-enviar svg {
        width: 20px;
        height: 20px;
    }
</style>

<div class="forum-container">
    <a href="{{ route('forum.index') }}#servicos" class="btn-voltar">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Voltar aos Topicos
    </a>

    <h1 class="topico-titulo">{{ $topico->titulo }}</h1>
    <p class="topico-descricao">{{ $topico->descricao }}</p>
    <p><small>Criado por <strong>{{ $topico->autor }}</strong> em {{ $topico->created_at->format('d/m/Y') }}</small></p>

    <div class="divider"></div>

    <div class="chat-wrapper">
        <div class="conversas-box">
            <h3>Conversas</h3>

            @foreach ($conversas as $conversa)
                <div class="conversa-card">
                    <p style="font-size:1.05rem; color:#374151;">{{ $conversa->conteudo }}</p>
                    <p class="conversa-meta">
                        <strong>{{ $conversa->autor }}</strong> —
                        {{ $conversa->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="form-box">
            <h4>Enviar uma nova mensagem</h4>

            <form action="{{ route('forum.responder', $topico->id) }}" method="POST">
                @csrf

                <div class="input-group">
                    <label class="input-label" for="autor">Seu nome</label>
                    <input type="text" class="form-control" name="autor" id="autor"
                        value="{{ auth()->user()->name ?? '' }}" placeholder="Digite seu nome (opcional)" readonly>
                </div>

                <div class="input-group">
                    <label class="input-label" for="conteudo">Mensagem</label>
                    <textarea name="conteudo" id="conteudo" class="form-control" rows="4" required
                        placeholder="Escreva sua mensagem..."></textarea>
                </div>

                <button type="submit" class="btn-enviar">
                    Enviar Mensagem
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer') o botao de voltar mais pra baixo
