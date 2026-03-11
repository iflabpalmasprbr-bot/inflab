@include('layouts.cabecalho')
@php
    /*
|--------------------------------------------------------------------------
| Página do Fórum
|--------------------------------------------------------------------------
|
| Esta view exibe o fórum da aplicação, permitindo que os usuários:
| - Visualizem todos os tópicos existentes
| - Pesquisem e filtrem tópicos por categoria
| - Criem novos tópicos (limite de 1 por semana para usuários comuns)
|
| Administradores podem selecionar e excluir múltiplos tópicos.
| A página combina lista de tópicos e formulário em um layout responsivo,
| com estilos e scripts para melhor interatividade.
|
*/
@endphp
<style>
    /* ===== CONFIGURAÇÃO GLOBAL ===== */
    .forum-container,
    .forum-container * {
        font-family: "Inter", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .bottom-btn,
    .bottom-btn:focus,
    .bottom-btn:active,
    .delete-btn,
    .delete-btn:focus,
    .delete-btn:active {
        outline: none !important;
        border: none !important;
        box-shadow: none !important;
    }

    .filtro-label {
        color: #2563eb;
        font-weight: 700;
    }

    .forum-container {
        max-width: 1250px;
        margin: 55px auto;
        padding: 0 20px;
        animation: fadeIn .35s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== TÍTULO PRINCIPAL ===== */
    .forum-container h1 {
        text-align: center;
        font-size: 2.8em;
        font-weight: 900;
        color: #1e40af;
        margin-bottom: 40px;
        letter-spacing: -1px;
    }

    .forum-container h1::after {
        content: "";
        width: 140px;
        height: 4px;
        background: #1e40af;
        margin: 12px auto 0;
        display: block;
        border-radius: 3px;
        opacity: .8;
    }

    /* ===== SUBTÍTULOS ===== */
    .forum-subtitulo {
        font-size: 1.55em;
        font-weight: 800;
        color: #1e3a8a;
        margin-bottom: 20px;
    }

    /* ===== GRID ===== */
    .forum-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
    }

    @media (max-width: 900px) {
        .forum-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ===== FORMULÁRIO ===== */
    .forum-form {
        background: #fff;
        border-radius: 14px;
        padding: 25px;
        border: 1px solid #d0d7e0;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.06);
    }

    .forum-form h3 {
        text-align: center;
        color: #1e293b;
        margin-bottom: 20px;
        font-size: 1.3em;
        font-weight: 700;
    }

    .forum-form input,
    .forum-form textarea,
    .forum-form select {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 12px;
        background: #f8fafc;
        font-size: 0.95em;
        margin-bottom: 15px;
        transition: border-color .2s;
    }

    .forum-form input:focus,
    .forum-form textarea:focus,
    .forum-form select:focus {
        border-color: #2563eb;
        outline: none;
        background: #fff;
    }

    /* ===== TÓPICOS ===== */
    .forum-topic {
        background: #ffffff;
        border-radius: 14px;
        padding: 22px;
        border: 1px solid #d1d9e6;
        margin-bottom: 18px;
        transition: all .18s ease;
        cursor: pointer;
    }

    .forum-topic:hover {
        transform: translateY(-4px);
        border-color: #2563eb;
        box-shadow: 0 5px 12px rgba(0, 0, 0, 0.08);
    }

    /* TÍTULO DO TÓPICO */
    .forum-topic a {
        font-weight: 800;
        color: #2563eb;
        /* azul mais claro */
        text-decoration: none;
        /* remove underline */
    }

    .forum-topic a:hover {
        color: #1d4ed8;
        /* azul suave no hover */
        text-decoration: none;
    }

    .forum-topic p {
        margin-top: 6px;
        font-size: 0.95em;
        color: #334155;
    }

    /* ===== BOTÕES ===== */
    .bottom-btn {
        padding: 10px 22px;
        background: #0a6cc4;
        color: white;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        transition: .20s;
    }

    .bottom-btn:hover {
        background: #095ba5;
    }

    .delete-btn {
        background: #ef4444 !important;
    }

    .delete-btn:hover {
        background: #c02626 !important;
    }

    /* ===== TOPO DOS BOTÕES ===== */
    .top-buttons {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 18px;
    }

    /* ===== FILTRO ===== */
    .filtro-container {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 15px;
    }

    .filtro-container select {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        background: #f8fafc;
        transition: .2s;
    }

    .filtro-container select:focus {
        border-color: #2c4885;
        background: #ffffff;
    }
</style>

<div class="forum-container">
    <h1>Fórum</h1>

    {{-- MENSAGENS --}}
    @if (session('error'))
        <div style="color:#b91c1c; font-weight:bold; text-align:center; margin-bottom:15px;">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="color:#166534; font-weight:bold; text-align:center; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    @php
        $admins = ['carolbrm265@gmail.com', 'fernandes.junior@ifpr.edu.br', 'jean.gentilini@ifpr.edu.br'];
        $user = auth()->user();
        $isAdmin = $user && in_array(strtolower($user->email), $admins);
    @endphp

    <div class="forum-grid">

        {{-- LISTA DE TÓPICOS --}}
        <div>
            <h2 class="forum-subtitulo">Tópicos em Aberto</h2>

            <div class="filtro-container">
                <label class="filtro-label">Filtrar por Assunto</label>
                <select id="filtroCategoria">
                    <option value="">Todas</option>
                    <option value="Comversa">Comversa</option>
                    <option value="Fisica">Física</option>
                    <option value="Robotica">Robótica</option>
                    <option value="Duvidas">Dúvidas</option>
                </select>

                <input type="text" id="pesquisaTopico" placeholder="Pesquisar título..."
                    style="padding:8px 12px; border-radius:8px; border:1px solid #cbd5e1; width:180px;">
            </div>

            @if ($isAdmin)
                <form action="{{ route('forum.destroyMultiple') }}" method="POST">
                    @csrf
                    @method('DELETE')
            @endif

            <div class="top-buttons">
                <a href="{{ route('home') }}" class="bottom-btn">← Voltar</a>

                @if ($isAdmin)
                    <button type="submit" class="bottom-btn delete-btn">Excluir Selecionados</button>
                @endif
            </div>

            @foreach ($topicos as $topico)
                <div class="forum-topic" data-categoria="{{ $topico->categoria }}"
                    onclick="window.location='{{ route('forum.show', $topico->id) }}'">

                    <div style="display:flex; align-items:center; gap:8px;">
                        @if ($isAdmin)
                            <input type="checkbox" name="topicos[]" value="{{ $topico->id }}"
                                onclick="event.stopPropagation();">
                        @endif

                        <a href="{{ route('forum.show', $topico->id) }}">
                            {{ $topico->titulo }}
                        </a>
                    </div>

                    <p>Assunto: <strong>{{ $topico->categoria }}</strong></p>
                    <p>Criado por <strong>{{ $topico->autor }}</strong> em {{ $topico->created_at->format('d/m/Y') }}
                    </p>
                </div>
            @endforeach

            @if ($isAdmin)
                </form>
            @endif
        </div>

        {{-- FORMULÁRIO --}}
        <div class="forum-form">
            <h3>Criar Novo Tópico</h3>

            @php
                $jaCriou =
                    !$isAdmin &&
                    \App\Models\Topico::where('autor', $user->name)
                        ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                        ->exists();
            @endphp

            @if (!$isAdmin && $jaCriou)
                <p style="color:#b91c1c; text-align:center; font-weight:bold;">
                    Você já criou 1 tópico esta semana.
                </p>
            @else
                <form action="{{ route('forum.store') }}" method="POST">
                    @csrf

                    <input type="text" name="titulo" placeholder="Título do tópico" required>

                    <textarea name="descricao" rows="3" placeholder="Descrição..." required></textarea>

                    <select name="categoria" id="categoriaSelect" required>
                        <option value="" disabled selected>Assunto</option>
                        <option value="Comversa">Comversa</option>
                        <option value="Fisica">Física</option>
                        <option value="Robotica">Robótica</option>
                        <option value="Duvidas">Dúvidas</option>
                        <option value="Outro">Outro</option>
                    </select>

                    <input type="text" name="categoria_outro" id="categoriaOutroForm" placeholder="Digite o assunto"
                        style="display:none;">

                    <button type="submit" class="bottom-btn" style="width:100%; margin-top:10px;">
                        Criar Tópico
                    </button>

                </form>
            @endif
        </div>

    </div>
</div>

<script>
    const pesquisaInput = document.getElementById('pesquisaTopico');

    pesquisaInput.addEventListener('keyup', function() {
        const termo = this.value.toLowerCase();

        topicos.forEach(t => {
            const titulo = t.querySelector('a').innerText.toLowerCase();
            t.style.display = titulo.includes(termo) ? 'block' : 'none';
        });
    });
</script>

<script>
    const categoriaSelect = document.getElementById('categoriaSelect');
    const categoriaOutroForm = document.getElementById('categoriaOutroForm');

    categoriaSelect?.addEventListener('change', function() {
        if (this.value === 'Outro') {
            categoriaOutroForm.style.display = 'block';
            categoriaOutroForm.required = true;
        } else {
            categoriaOutroForm.style.display = 'none';
            categoriaOutroForm.required = false;
            categoriaOutroForm.value = "";
        }
    });
</script>

<script>
    const filtro = document.getElementById('filtroCategoria');
    const topicos = document.querySelectorAll('.forum-topic');

    filtro.addEventListener('change', function() {
        const categoria = this.value;

        topicos.forEach(t => {
            t.style.display = (!categoria || t.dataset.categoria === categoria) ?
                'block' :
                'none';
        });
    });
</script>

@include('layouts.footer')
