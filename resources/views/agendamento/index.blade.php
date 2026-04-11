@include('layouts.cabecalho')

<div class="page-wrapper">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ===== BOTÃO VOLTAR ===== -->
    <div class="linha-voltar">
        <!-- ===== MENSAGEM INFORMATIVA ===== -->
        <div class="mensagem-info">
            ⚠️ Você possui agendamentos pendentes. Eles estão em análise e, assim que um administrador ou professor
            aprovar, o status será atualizado. Fique atento à sua barra de notificações para não perder nenhuma
            atualização.
        </div>
        <style>
            /* ===== MENSAGEM INFORMATIVA ===== */
            .mensagem-info {
                background-color: #fff3cd;
                color: #856404;
                border: 1px solid #ffeeba;
                padding: 15px 20px;
                border-radius: 8px;
                font-size: 16px;
                margin-bottom: 20px;
            }
        </style>

        <a href="{{ route('home') }}" class="btn btn-voltar">← Voltar para Home</a>
    </div>
    @php
        $specialEmails = ['fernandes.junior@ifpr.edu.br', 'jean.gentilini@ifpr.edu.br', 'carolbrm265@gmail.com'];
        $userEmail = strtolower(Auth::user()->email);
        $showAll = in_array($userEmail, $specialEmails);

        // Separa a lista em dois grupos: Bloqueios de sistema e Agendamentos normais
        $bloqueios = $agendamentos->where('email', 'admin@iflab.com');
        $solicitacoes = $agendamentos->where('email', '!=', 'admin@iflab.com');
    @endphp
    <h2 class="titulo-pagina">Agendamentos em Aguardo</h2>
    @if (in_array(strtolower(Auth::user()->email), [
            'fernandes.junior@ifpr.edu.br',
            'jean.gentilini@ifpr.edu.br',
            'carolbrm265@gmail.com',
        ]))
        <form class="minha-form-class" action="{{ route('agendamentos.index') }}" method="GET">
            <input type="date" id="data_inicio" name="data_inicio" value="{{ request('data_inicio') }}">
            <input type="date" id="data_fim" name="data_fim" value="{{ request('data_fim') }}">
            <button type="submit" class="">Buscar</button>
        </form>
    @endif
    @if ($agendamentos->isEmpty())
        <p class="nenhum">Nenhum agendamento encontrado.</p>
    @else
        <div class="agendamento-container">

            {{-- ===== SEÇÃO: AGENDAMENTOS BLOQUEADOS (ADMIN@IFLAB.COM) ===== --}}
            {{-- Botão Flutuante no Canto Inferior Direito --}}
            {{-- Botão Flutuante (Ícone no Canto) --}}

            @if ($showAll && $bloqueios->isNotEmpty())
                <div id="btn-bloqueios-floating" title="Ver Horários Bloqueados">
                    <i class="fa fa-lock"></i>
                    <span class="badge-count">{{ $bloqueios->count() }}</span>
                </div>

                {{-- Painel Lateral --}}
                <div id="sidebar-bloqueios" class="sidebar-bloqueios">
                    <div class="sidebar-header">
                        <h3><i class="fa fa-lock"></i> Bloqueios</h3>
                        <button id="close-sidebar">&times;</button>
                    </div>

                    <div class="sidebar-content">
                        <p style="font-size: 13px; color: #64748b; margin-bottom: 15px;">Estes horários estão reservados
                            pelo sistema.</p>
                        @if ($showAll && $bloqueios->isNotEmpty())
                            <div
                                style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #cbd5e1; display: flex; align-items: center; gap: 10px;">
                                <label style="font-size: 13px; cursor: pointer; color: #1c3c73; font-weight: bold;">
                                    <input type="checkbox" id="selecionar-todos-bloqueios"> Selecionar Todos
                                </label>
                                <button class="btn-excluir" id="btn-excluir-massa-bloqueios"
                                    style="padding: 4px 10px; font-size: 12px;">Excluir Selecionados</button>
                            </div>
                        @endif
                        @foreach ($bloqueios as $ag)
                            <div class="agendamento-card card-bloqueado" style="padding: 15px; margin-bottom: 10px;">
                                <h4 style="font-size: 16px; color: #1c3c73; margin-bottom: 8px;">{{ $ag->nome }}
                                </h4>
                                <div style="font-size: 14px; line-height: 1.4;">
                                    <p><strong>Data:</strong>
                                        {{ \Carbon\Carbon::parse($ag->data_desejada)->format('d/m/Y') }}</p>
                                    <p><strong>Hora:</strong> {{ $ag->horario_desejado }}</p>
                                    <p><strong>Motivo:</strong> {{ $ag->descricao_projeto }}</p>
                                </div>

                                @if ($showAll)
                                    <div class="agendamento-actions" style="margin-top: 10px; flex-wrap: wrap;">
                                        <label style="font-size: 12px; display: flex; align-items: center; gap: 5px;">
                                            <input type="checkbox" class="selecionar-agendamento"
                                                data-id="{{ $ag->id }}"> Selecionar
                                        </label>
                                        <button class="btn-excluir" data-id="{{ $ag->id }}"
                                            style="padding: 4px 8px; font-size: 12px;">Excluir</button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- Fundo escuro (dimmer) --}}
                <div id="overlay-sidebar" class="overlay-sidebar"></div>
            @endif
            {{-- ===== SEÇÃO: AGENDAMENTOS NORMAIS ===== --}}
            <div class="bloco-solicitacoes">
                @if ($bloqueios->isNotEmpty())
                    <h3 class="subtitulo-secao"><i class="fa fa-users"></i> Solicitações de Usuários</h3>
                @endif

                @foreach ($solicitacoes as $ag)
                    @if ($showAll || strtolower($ag->email) == $userEmail)
                        <div class="agendamento-card">
                            <h3 class="agendamento-nome">{{ $ag->nome }}</h3>

                            <div class="agendamento-info">
                                <p><strong>E-mail:</strong> {{ $ag->email }}</p>
                                <p><strong>Telefone:</strong> {{ $ag->telefone }}</p>
                                <p><strong>Categoria:</strong> {{ $ag->categoria }}</p>
                                <p><strong>Serviço:</strong> {{ $ag->servico }}</p>
                                <p><strong>Data:</strong>
                                    {{ \Carbon\Carbon::parse($ag->data_desejada)->format('d/m/Y') }}</p>
                                <p><strong>Hora:</strong> {{ $ag->horario_desejado }}</p>
                                <p><strong>Projeto:</strong> {{ $ag->descricao_projeto }}</p>
                                <p>
                                    <strong>Status:</strong>
                                    <span
                                        class="@if (strtolower($ag->status) == 'aceito') status-aceito 
                                             @elseif(strtolower($ag->status) == 'recusado') status-recusado 
                                             @else status-andamento @endif">
                                        {{ $ag->status }}
                                    </span>
                                </p>
                            </div>

                            @if ($showAll)
                                <div class="agendamento-actions">
                                    <input type="checkbox" class="selecionar-agendamento"
                                        data-id="{{ $ag->id }}"> Selecionar
                                    <button class="btn-aceitar" data-id="{{ $ag->id }}"><i
                                            class="fa fa-check"></i> Aceitar</button>
                                    <button class="btn-recusar" data-id="{{ $ag->id }}"><i
                                            class="fa fa-times"></i> Recusar</button>
                                    <button class="btn-excluir" data-id="{{ $ag->id }}">Excluir</button>
                                </div>
                            @endif

                            {{-- Comentário do Professor --}}
                            <div class="admin-comentario-box">
                                <div class="admin-comentario-header">
                                    <span class="comentario-icon"><i class="fa-solid fa-comment-dots"></i></span>
                                    <span class="comentario-title">Comentário do Professor(a)</span>
                                </div>

                                @if ($showAll)
                                    <form action="{{ route('update.comentario') }}" method="POST"
                                        class="comentario-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ag->id }}">
                                        <input type="text" name="comentario" class="comentario-input"
                                            value="{{ $ag->comentario }}" placeholder="Digite um comentário...">
                                        <button type="submit" class="comentario-btn">💾 Salvar</button>
                                    </form>
                                @else
                                    <div class="comentario-texto">
                                        {{ $ag->comentario ?? 'Nenhum comentário registrado.' }}</div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
    <style>
        /* ==========================================================================
   1. CONFIGURAÇÕES GERAIS E LAYOUT
   ========================================================================== */
        body {
            opacity: 0;
            transition: opacity 0.3s ease-in;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .page-wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 20px 25px;
        }

        .titulo-pagina {
            color: #004a8f;
            font-size: 30px;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .divisor-secoes {
            border: 0;
            border-top: 2px solid #e2e8f0;
            margin: 30px 0;
        }

        /* ==========================================================================
   2. BOTÃO FLUTUANTE E SIDEBAR (BLOQUEIOS)
   ========================================================================== */
        #btn-bloqueios-floating {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #1c3c73;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        #btn-bloqueios-floating:hover {
            transform: scale(1.1);
        }

        .badge-count {
            position: absolute;
            top: 0;
            right: 0;
            background: #e74c3c;
            color: white;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .sidebar-bloqueios {
            position: fixed;
            top: 0;
            right: -350px;
            /* Escondido */
            width: 320px;
            height: 100%;
            background: #f0f4f8;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            transition: right 0.4s cubic-bezier(0.05, 0.74, 0.2, 0.99);
            display: flex;
            flex-direction: column;
        }

        .sidebar-bloqueios.active {
            right: 0;
        }

        .sidebar-header {
            padding: 20px;
            background: #1c3c73;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-content {
            padding: 15px;
            overflow-y: auto;
            flex: 1;
        }

        #close-sidebar {
            background: none;
            border: none;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }

        .overlay-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            z-index: 1000;
        }

        .overlay-sidebar.active {
            display: block;
        }

        /* ==========================================================================
   3. SEÇÃO DE ADMINISTRAÇÃO E COMENTÁRIOS
   ========================================================================== */
        .bloco-admin-sistema {
            background-color: #f8fafc;
            border: 2px dashed #cbd5e1;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .subtitulo-secao {
            color: #1c3c73;
            font-size: 1.2rem;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .card-bloqueado {
            border-left: 5px solid #64748b !important;
            background-color: #ffffff;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .admin-comentario-box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-left: 4px solid #2563eb;
            padding: 15px;
            border-radius: 6px;
            margin-top: 10px;
        }

        .admin-comentario-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .comentario-title {
            font-weight: 600;
            color: #374151;
        }

        .comentario-form {
            display: flex;
            gap: 8px;
        }

        .comentario-input {
            flex: 1;
            padding: 8px 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            outline: none;
            transition: 0.2s;
        }

        .comentario-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 3px rgba(37, 99, 235, 0.3);
        }

        .comentario-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        /* ==========================================================================
   4. FORMULÁRIO DE BUSCA E DATAS
   ========================================================================== */
        form.minha-form-class {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .minha-form-class input[type="date"] {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .minha-form-class input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .minha-form-class button {
            padding: 8px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .minha-form-class button:hover {
            background-color: #0056b3;
        }

        /* ==========================================================================
   5. CARDS DE AGENDAMENTO E STATUS
   ========================================================================== */
        .agendamento-container {
            display: flex;
            /* Essencial para o gap funcionar */
            flex-direction: column;
            gap: 25px;
            padding: 20px 0;
            /* Dá um respiro no topo e na base da lista */
        }

        .agendamento-card {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            border-left: 5px solid #285991;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease-in-out;
            width: 100%;
            margin-bottom: 10px;
            /* Margem extra para garantir que não grudem */
            box-sizing: border-box;
            /* Garante que o padding não "estoure" a largura */
        }

        .agendamento-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .agendamento-nome {
            margin-bottom: 15px;
            font-size: 22px;
            color: #1c3c73;
            font-weight: 600;
        }

        .agendamento-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px 20px;
        }

        .agendamento-info p {
            margin: 5px 0;
            font-size: 15px;
            color: #333;
            word-wrap: break-word;
        }

        .agendamento-info strong {
            color: #004a8f;
        }

        /* Cores de Status */
        .status-aceito {
            color: #27ae60;
            font-weight: bold;
        }

        .status-recusado {
            color: #c0392b;
            font-weight: bold;
        }

        .status-andamento {
            color: #2980b9;
            font-weight: bold;
        }

        /* ==========================================================================
   6. BOTÕES DE AÇÃO
   ========================================================================== */
        .btn {
            display: inline-block;
            padding: 10px 22px;
            font-size: 15px;
            border-radius: 8px;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(135deg, #285991, #1c3c73);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }

        .btn:hover {
            background: linear-gradient(135deg, #1c3c73, #285991);
            transform: translateY(-2px);
        }

        .agendamento-actions {
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-aceitar,
        .btn-recusar,
        .btn-excluir {
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            transition: 0.2s ease;
        }

        .btn-aceitar {
            background-color: #27ae60;
        }

        .btn-aceitar:hover {
            background-color: #2ecc71;
        }

        .btn-recusar {
            background-color: #e67e22;
        }

        .btn-recusar:hover {
            background-color: #d35400;
        }

        .btn-excluir {
            background-color: #c0392b;
        }

        .btn-excluir:hover {
            background-color: #e74c3c;
        }

        /* ==========================================================================
   7. RESPONSIVIDADE
   ========================================================================== */
        @media (max-width: 768px) {
            .minha-form-class {
                flex-direction: column;
                align-items: stretch;
            }

            .minha-form-class input[type="date"],
            .minha-form-class button {
                width: 100%;
            }

            .agendamento-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .agendamento-actions button {
                width: 100%;
            }

            .agendamento-info {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .agendamento-card {
                padding: 15px;
            }

            .agendamento-nome {
                font-size: 18px;
            }
        }
    </style>
    <script>
        // 👇 FADE IN DA PÁGINA
        window.addEventListener('load', function() {
            document.body.style.opacity = "1";
        });
    </script>

    <script defer>
        document.addEventListener('DOMContentLoaded', function() {

            /**
             * Auxiliar: Coleta IDs marcados. 
             * Aceita um seletor opcional para filtrar de onde os IDs devem vir.
             */
            function getSelecionados(containerSelector = '') {
                let ids = [];
                const selector = containerSelector ?
                    `${containerSelector} .selecionar-agendamento:checked` :
                    '.selecionar-agendamento:checked';

                document.querySelectorAll(selector).forEach(cb => {
                    ids.push(cb.getAttribute('data-id'));
                });
                return ids;
            }

            /**
             * Função Genérica para enviar requisições (Aceitar, Recusar, Excluir)
             */
            function enviarAcao(url, ids, mensagemSucesso) {
                if (ids.length === 0 || ids[0] === null) {
                    alert('Por favor, selecione ao menos um item.');
                    return;
                }

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: ids
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert(mensagemSucesso);
                            location.reload();
                        } else {
                            alert('Erro ao processar a solicitação!');
                        }
                    })
                    .catch(() => alert('Erro na requisição ao servidor!'));
            }

            // --- LÓGICA DE SELEÇÃO ("SELECIONAR TUDO") ---

            // 1. Selecionar Tudo na Área Principal
            const checkTodosGlobal = document.getElementById('selecionar-todos-global');
            if (checkTodosGlobal) {
                checkTodosGlobal.addEventListener('change', function() {
                    // Marca apenas os que NÃO estão na sidebar
                    document.querySelectorAll(
                        'main .selecionar-agendamento, .container .selecionar-agendamento').forEach(
                        cb => {
                            if (!cb.closest('#sidebar-bloqueios')) {
                                cb.checked = this.checked;
                            }
                        });
                });
            }

            // 2. Selecionar Tudo na Sidebar de Bloqueios
            const checkTodosBloqueios = document.getElementById('selecionar-todos-bloqueios');
            if (checkTodosBloqueios) {
                checkTodosBloqueios.addEventListener('change', function() {
                    document.querySelectorAll('#sidebar-bloqueios .selecionar-agendamento').forEach(cb => {
                        cb.checked = this.checked;
                    });
                });
            }

            // --- EVENTOS DE BOTÕES ---

            // 1. EXCLUIR (Suporta Massa Principal, Massa Sidebar e Individual)
            document.querySelectorAll('.btn-excluir').forEach(btn => {
                btn.addEventListener('click', function() {
                    let ids = [];
                    const idIndividual = this.getAttribute('data-id');

                    // Verifica se é o botão de massa da sidebar
                    if (this.id === 'btn-excluir-massa-bloqueios') {
                        ids = getSelecionados('#sidebar-bloqueios');
                    }
                    // Verifica se é o botão de massa principal (sem id individual)
                    else if (!idIndividual) {
                        ids = getSelecionados(); // Pega tudo que estiver marcado na página
                    }
                    // Se for botão individual
                    else {
                        let selecionados = getSelecionados();
                        // Se houver itens marcados, usa a lista. Se não, usa o individual.
                        ids = selecionados.length > 0 ? selecionados : [idIndividual];
                    }

                    if (ids.length === 0) return alert('Selecione algo para excluir.');
                    if (!confirm(`Deseja realmente excluir ${ids.length} item(ns)?`)) return;

                    enviarAcao('{{ route('agendamento.excluir') }}', ids, 'Excluído com sucesso!');
                });
            });

            // 2. ACEITAR
            document.querySelectorAll('.btn-aceitar').forEach(btn => {
                btn.addEventListener('click', function() {
                    let selecionados = getSelecionados();
                    let idIndividual = this.getAttribute('data-id');
                    let ids = selecionados.length > 0 ? selecionados : [idIndividual];

                    if (!confirm('Deseja aceitar o(s) agendamento(s) selecionado(s)?')) return;
                    enviarAcao('{{ route('agendamento.aceitar') }}', ids,
                        'Agendamento(s) aceito(s)!');
                });
            });

            // 3. RECUSAR
            document.querySelectorAll('.btn-recusar').forEach(btn => {
                btn.addEventListener('click', function() {
                    let selecionados = getSelecionados();
                    let idIndividual = this.getAttribute('data-id');
                    let ids = selecionados.length > 0 ? selecionados : [idIndividual];

                    if (!confirm('Deseja recusar o(s) agendamento(s) selecionado(s)?')) return;
                    enviarAcao('{{ route('agendamento.recusar') }}', ids,
                        'Agendamento(s) recusado(s)!');
                });
            });

            /**
             * Controle do Sidebar de Bloqueios
             */
            const btnFloating = document.getElementById('btn-bloqueios-floating');
            const sidebar = document.getElementById('sidebar-bloqueios');
            const closeSidebar = document.getElementById('close-sidebar');
            const overlay = document.getElementById('overlay-sidebar');

            if (btnFloating) {
                const toggleSidebar = (state) => {
                    sidebar.classList[state ? 'add' : 'remove']('active');
                    overlay.classList[state ? 'add' : 'remove']('active');
                };

                btnFloating.addEventListener('click', () => toggleSidebar(true));
                closeSidebar.addEventListener('click', () => toggleSidebar(false));
                overlay.addEventListener('click', () => toggleSidebar(false));
            }
        });
    </script>
