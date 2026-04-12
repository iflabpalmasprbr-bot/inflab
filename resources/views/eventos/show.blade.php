@include('layouts.cabecalho')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-detalhes">
    <div class="evento-card">

        <div class="evento-header">
            <div class="titulo-grupo">
                <a href="/#eventos" class="link-voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
                <h2>{{ $evento->titulo }}</h2>
            </div>
            <span class="status-badge {{ strtolower($evento->status) }}">
                <span class="ponto-status"></span>
                {{ ucfirst($evento->status) }}
            </span>
        </div>

        <div class="evento-grid">
            <div class="evento-media">
                @if ($evento->imagem && Storage::disk('public')->exists($evento->imagem))
                    <img src="{{ Storage::url($evento->imagem) }}" alt="{{ $evento->titulo }}" class="evento-img">
                @else
                    <div class="sem-imagem">
                        <i class="fa-regular fa-image"></i>
                        <p>Nenhuma imagem disponível</p>
                    </div>
                @endif
            </div>

            <div class="evento-content">
                <div class="info-secao">
                    <label>Sobre o evento</label>
                    <p class="descricao">{{ $evento->descricao ?? 'Sem descrição detalhada.' }}</p>
                </div>

                <div class="info-grid-detalhes">
                    <div class="info-item">
                        <i class="fa-regular fa-calendar-check"></i>
                        <div>
                            <span>Data</span>
                            <p>{{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fa-regular fa-clock"></i>
                        <div>
                            <span>Horário</span>
                            <p>{{ $evento->hora_evento ? \Carbon\Carbon::parse($evento->hora_evento)->format('H:i') : '--:--' }}
                            </p>
                        </div>
                    </div>
                    <div class="info-item full-width">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <span>Localização</span>
                            <p>{{ $evento->local ?? 'Local a definir' }}</p>
                        </div>
                    </div>
                </div>

                @auth
                    {{-- DICA PROFISSIONAL: Use @can('admin') ou Gates em vez de listar emails aqui --}}
                    @if (in_array(strtolower(Auth::user()->email), [
                            'carolbrm265@gmail.com',
                            'fernandes.junior@ifpr.edu.br',
                            'jean.gentilini@ifpr.edu.br',
                        ]))
                        <div class="admin-actions">
                            <a href="{{ route('eventos.edit', $evento->id) }}" class="btn-action edit">
                                <i class="fa-regular fa-pen-to-square"></i> Editar
                            </a>
                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir este evento definitivamente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action delete">
                                    <i class="fa-regular fa-trash-can"></i> Excluir
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary: #2c68ac;
        --success: #1fa85b;
        --danger: #e53939;
        --warning: #f1c40f;
        --text-main: #2d3436;
        --text-muted: #636e72;
        --bg-card: #ffffff;
        --radius: 12px;
    }

    .container-detalhes {
        padding: 40px 20px;
        background-color: #f8f9fa;
        min-height: 80vh;
    }

    .evento-card {
        max-width: 1000px;
        margin: 0 auto;
        background: var(--bg-card);
        border-radius: var(--radius);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: 1px solid #edf2f7;
    }

    /* Header */
    .evento-header {
        padding: 25px 35px;
        border-bottom: 1px solid #f1f1f1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
    }

    .link-voltar {
        text-decoration: none;
        color: var(--primary);
        font-size: 14px;
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
    }

    .evento-header h2 {
        margin: 0;
        font-size: 24px;
        color: var(--text-main);
    }

    /* Status Badge */
    .status-badge {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .ponto-status {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-badge.ativo {
        background: #e6f7ee;
        color: var(--success);
    }

    .status-badge.pendente {
        background: #fff9e6;
        color: #af8900;
    }

    .status-badge.cancelado {
        background: #fdeaea;
        color: var(--danger);
    }

    /* Layout Grid */
    .evento-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 0;
    }

    .evento-media {
        padding: 35px;
        background: #fafafa;
    }

    .evento-img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        border-radius: var(--radius);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .sem-imagem {
        height: 350px;
        background: #eee;
        border-radius: var(--radius);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #aaa;
    }

    .sem-imagem i {
        font-size: 50px;
        margin-bottom: 10px;
    }

    /* Conteúdo */
    .evento-content {
        padding: 35px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .info-secao label {
        display: block;
        font-size: 12px;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 1px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .descricao {
        font-size: 16px;
        line-height: 1.6;
        color: #4a4a4a;
        margin-bottom: 25px;
    }

    .info-grid-detalhes {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        background: #fcfcfc;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #f0f0f0;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .info-item i {
        margin-top: 4px;
        color: var(--primary);
        font-size: 18px;
    }

    .info-item span {
        display: block;
        font-size: 11px;
        color: var(--text-muted);
        text-transform: uppercase;
    }

    .info-item p {
        margin: 0;
        font-weight: 600;
        color: var(--text-main);
    }

    .full-width {
        grid-column: span 2;
    }

    /* Botões Admin */
    .admin-actions {
        margin-top: 30px;
        display: flex;
        gap: 10px;
        border-top: 1px solid #eee;
        padding-top: 25px;
    }

    .btn-action {
        flex: 1;
        padding: 12px;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: 0.3s;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-action.edit {
        background: #f0f7ff;
        color: var(--primary);
    }

    .btn-action.edit:hover {
        background: var(--primary);
        color: #fff;
    }

    .btn-action.delete {
        background: #fff5f5;
        color: var(--danger);
    }

    .btn-action.delete:hover {
        background: var(--danger);
        color: #fff;
    }

    /* Responsividade */
    @media (max-width: 850px) {
        .evento-grid {
            grid-template-columns: 1fr;
        }

        .evento-media {
            padding: 20px;
        }

        .evento-img,
        .sem-imagem {
            height: 250px;
        }

        .evento-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
    }
</style>

@include('layouts.footer')
