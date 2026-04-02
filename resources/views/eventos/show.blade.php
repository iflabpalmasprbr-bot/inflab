@include('layouts.cabecalho')

<div class="evento-card">
    <!-- ===== HEADER ===== -->
    <div class="evento-header">
        <h2>{{ $evento->titulo }}</h2>
        <span class="evento-status {{ strtolower($evento->status) }}">{{ ucfirst($evento->status) }}</span>
    </div>

    <!-- ===== CORPO ===== -->
    <div class="evento-body">
        @if ($evento->imagem && Storage::disk('public')->exists($evento->imagem))
            <img src="{{ Storage::url($evento->imagem) }}" alt="Imagem do Evento" class="evento-imagem">
        @else
            <div class="evento-imagem sem-imagem">Sem imagem</div>
        @endif

        <div class="evento-info">
            <p><strong>Descrição:</strong> {{ $evento->descricao ?? 'Não informada' }}</p>
            <p><strong>Data:</strong> {{ $evento->data_evento }}</p>
            <p><strong>Hora:</strong> {{ $evento->hora_evento ?? 'Não informada' }}</p>
            <p><strong>Local:</strong> {{ $evento->local ?? 'Não informado' }}</p>
        </div>
    </div>

    <!-- ===== AÇÕES ===== -->
    <div class="evento-actions">
        <a href="/#eventos" class="btn btn-voltar">Voltar para a lista</a>

        @auth
            @if (in_array(strtolower(Auth::user()->email), [
                    'carolbrm265@gmail.com',
                    'fernandes.junior@ifpr.edu.br',
                    'jean.gentilini@ifpr.edu.br',
                ]))
                <div class="btn-group">
                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-editar">Editar</a>
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST"
                        onsubmit="return confirm('Excluir evento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-excluir">Excluir</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</div>

<style>
    /* ===== CARD PRINCIPAL ===== */
    .evento-card {
        max-width: 850px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px 35px;
        border-radius: 16px;
        font-family: "Inter", Arial, sans-serif;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
        transition: all 0.3s ease;
    }

    .evento-card:hover {
        transform: translateY(-3px);
    }

    /* ===== HEADER ===== */
    .evento-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .evento-header h2 {
        font-size: 28px;
        font-weight: 700;
    }

    .evento-status {
        padding: 6px 14px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        color: #fff;
    }

    .evento-status.ativo {
        background-color: #1fa85b;
    }

    .evento-status.pendente {
        background-color: #f1c40f;
        color: #333;
    }

    .evento-status.cancelado {
        background-color: #e53939;
    }

    /* ===== IMAGEM ===== */
    .evento-body {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .evento-imagem {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 14px;
        border: 1px solid #e0e0e0;
        transition: transform 0.3s ease;
    }

    .evento-imagem:hover {
        transform: scale(1.03);
    }

    .sem-imagem {
        background: #f5f5f5;
        color: #888;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 250px;
        border-radius: 14px;
        font-size: 18px;
    }

    /* ===== INFORMAÇÕES ===== */
    .evento-info p {
        font-size: 17px;
        margin: 8px 0;
        line-height: 1.5;
    }

    .evento-info strong {
        color: #333;
    }

    /* ===== AÇÕES ===== */
    .evento-actions {
        margin-top: 25px;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        justify-content: space-between;
        align-items: center;
    }

    /* ===== BOTÕES ===== */
    .btn {
        padding: 10px 28px;
        font-size: 15px;
        border-radius: 10px;
        transition: all 0.2s ease;
        color: #fff;
        border: none;
        text-decoration: none;
        cursor: pointer;
    }

    /* VOLTAR */
    .btn-voltar {
        background-color: #2c68ac;
    }

    .btn-voltar:hover {
        background-color: #0052b3;
        transform: translateY(-2px) scale(1.03);
    }

    /* EDITAR */
    .btn-editar {
        background-color: #1fa85b;
    }

    .btn-editar:hover {
        background-color: #157a44;
        transform: translateY(-2px) scale(1.03);
    }

    /* EXCLUIR */
    .btn-excluir {
        background-color: #e53939;
    }

    .btn-excluir:hover {
        background-color: #b71c1c;
        transform: translateY(-2px) scale(1.03);
    }

    .btn-group {
        display: flex;
        gap: 12px;
    }

    /* ===== RESPONSIVO ===== */
    @media (max-width: 700px) {
        .evento-card {
            padding: 20px;
        }

        .evento-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .evento-imagem {
            height: 200px;
        }

        .evento-actions {
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

@include('layouts.footer')
