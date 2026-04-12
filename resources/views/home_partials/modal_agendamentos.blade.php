<!-- ===================== TOAST ===================== -->
<div id="mensagemSucesso" class="toast-sucesso">
    <i class="bi bi-check-circle-fill"></i> Campos preenchidos com sucesso!

</div>

<!-- ===================== MODAL ===================== -->
<div id="agendaModal" class="custom-modal">
    <div class="custom-modal-overlay"></div>

    <div class="custom-modal-content">
        <div class="custom-modal-header">
            <h5 id="modalTitle">
                <i class="bi bi-calendar-event-fill" style="margin-right: 8px;"></i>
                Agenda -
            </h5>
            <button class="custom-close">&times;</button>
        </div>

        <div class="custom-modal-body">
            <div class="table-responsive">
                <table class="agenda-table">
                    <thead>
                        <tr>
                            <th>Horário</th>
                            <th class="col-dia">Segunda <br><small
                                    style="font-weight: normal; font-size: 0.8em;"></small></th>
                            <th class="col-dia">Terça <br><small style="font-weight: normal; font-size: 0.8em;"></small>
                            </th>
                            <th class="col-dia">Quarta <br><small
                                    style="font-weight: normal; font-size: 0.8em;"></small></th>
                            <th class="col-dia">Quinta <br><small
                                    style="font-weight: normal; font-size: 0.8em;"></small></th>
                            <th class="col-dia">Sexta <br><small style="font-weight: normal; font-size: 0.8em;"></small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $horas = ['08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00'];
                        @endphp
                        @foreach ($horas as $hora)
                            <tr>
                                <td class="hora"><strong>{{ $hora }}</strong></td>
                                @for ($dia = 1; $dia <= 5; $dia++)
                                    <td class="agenda-celula" data-dia="{{ $dia }}"
                                        data-hora="{{ $hora }}">
                                        <button type="button" class="btn-agendar">Marcar</button>
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if (in_array(strtolower(Auth::user()->email ?? ''), [
                'carolbrm265@gmail.com',
                'fernandes.junior@ifpr.edu.br',
                'jean.gentilini@ifpr.edu.br',
            ]))
            <div class="custom-modal-footer"
                style="padding: 15px; border-top: 1px solid #eee; text-align: right; background: #f9f9f9;">
                <button type="button" class="btn-confirmar-admin" onclick="fecharModal()"
                    style="background: #1f4e79; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: bold;">
                    <i class="bi bi-check-all"></i> Confirmar Seleção
                </button>
                <button id="btnModo">Selecionar vários horários</button>
                <h6 class="info-modo">
                    Use este botão para ativar a seleção de vários horários ao mesmo tempo.
                </h6>
            </div>



        @endif

    </div>
</div>


<!-- ===================== CssS ===================== -->
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    #btnModo {
        background: #d6e8f8;
        color: #1f4e79;
        border: none;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* hover */
    #btnModo:hover {
        background: #1f4e79;
        color: white;
    }

    /* quando estiver ativo (modo múltiplo) */
    #btnModo.ativo {
        background: #1f4e79;
        color: white;
        box-shadow: 0 0 0 2px rgba(31, 78, 121, 0.2);
    }

    .info-modo {
        color: #1f4e79;
        font-size: 13px;
        margin-bottom: 8px;
        font-weight: 500;
    }

    /* efeito clique */
    #btnModo:active {
        transform: scale(0.97);
    }

    .custom-modal-header h5 i {
        font-size: 2rem;
        /* aumenta o tamanho do ícone */
        vertical-align: middle;
        /* centraliza com o texto */
        color: #1f4e79;
        /* cor opcional */
    }

    /* TOAST */
    .toast-sucesso {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.9);
        background: #1f5f8b;
        color: white;
        padding: 14px 22px;
        border-radius: 10px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        opacity: 0;
        z-index: 2000;
        pointer-events: none;
        transition: 0.3s ease;
    }

    .toast-sucesso.show {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    /* MODAL */
    .custom-modal {
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        color: #1a2e41;
    }

    .custom-modal.active {
        display: flex;
    }

    .custom-modal-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        backdrop-filter: blur(4px);
    }

    .custom-modal-content {
        position: relative;
        background: #ffffff;
        width: 92%;
        max-width: 900px;
        border-radius: 14px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        overflow: hidden;
        animation: modalFade 0.25s ease;
    }

    .custom-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        background: #f5f8fb;
        border-bottom: 1px solid #e3e3e3;
    }

    .custom-modal-header h5 {
        font-size: 1.8rem;
        font-weight: 700;
        text-align: center;
        flex: 1;
        color: #1f4e79b6;
        /* para o h5 ocupar o espaço disponível */
    }

    .custom-close {
        background: none;
        border: none;
        font-size: 22px;
        cursor: pointer;
        transition: 0.2s;
    }

    .custom-close:hover {
        transform: scale(1.2);
    }

    .custom-modal-body {
        padding: 18px;
        max-height: 75vh;
        overflow-y: auto;
    }

    /* TABELA */
    .agenda-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        table-layout: fixed;
        text-align: center;
    }

    .agenda-table th {
        background: #2e557d;
        color: white;
        padding: 10px 6px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .agenda-table th:first-child,
    .agenda-table td:first-child {
        width: 80px;
    }

    .agenda-table td {
        padding: 6px;
        height: 55px;
        vertical-align: middle;
        border-bottom: 1px solid #e6e6e6;
    }

    .agenda-table tbody tr:nth-child(even) {
        background: #f4f8fc;
    }

    .hora {
        font-weight: 600;
        background: #eef4fa;
        font-size: 0.85rem;
    }

    /* BOTÕES */
    .btn-agendar,
    .btn-ocupado {
        width: 100%;
        min-height: 38px;
        padding: 4px 6px;
        font-size: 0.75rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        word-break: break-word;
        transition: 0.2s ease;
        gap: 4px;
        /* espaço entre ícone e texto */
        flex-wrap: wrap;
        /* permite quebrar em linhas se necessário */
    }

    .btn-agendar {
        background: #d6e8f8;
        border: 1px solid #4a90e2;
        color: #1f4e79;
        cursor: pointer;
    }

    .btn-agendar:hover {
        background: #c4ddf3;
    }

    .btn-ocupado {
        background: #ff6b6b;
        border: none;
        color: white;
        cursor: not-allowed;
    }

    @media (max-width:768px) {

        .agenda-table th,
        .agenda-table td {
            font-size: 0.75rem;
            padding: 4px;
        }

        .agenda-table td {
            height: 50px;
        }

        .btn-agendar,
        .btn-ocupado {
            font-size: 0.65rem;
            min-height: 34px;
        }

        .custom-modal-content {
            width: 96%;
        }
    }

    @keyframes modalFade {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- ===================== JS ===================== -->
<script>
    /* ===================== Modal ===================== */
    const modal = document.getElementById('agendaModal');
    const closeBtn = modal.querySelector('.custom-close');
    const overlay = modal.querySelector('.custom-modal-overlay');

    function abrirModal() {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function fecharModal() {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    closeBtn.addEventListener('click', fecharModal);
    overlay.addEventListener('click', fecharModal);

    /* ===================== Título com mês ===================== */
    const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho",
        "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
    ];
    const dataAtual = new Date();
    document.getElementById('modalTitle').textContent = `Agenda - ${meses[dataAtual.getMonth()]}`;

    /* ===================== Toast ===================== */
    function mostrarToast(msg) {
        const toast = document.getElementById('mensagemSucesso');
        toast.innerHTML = `<i class="bi bi-check-circle-fill"></i> ${msg}`;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    }

    /* ===================== Cliques das células ===================== */

    // 1. Definição Global (fora das funções)
    if (typeof horáriosSelecionados === 'undefined') {
        var horáriosSelecionados = [];
    }

    // 2. Lista de Admins (usando a sua lógica de e-mail)
    const listaAdmins = [
        'carolbrm265@gmail.com',
        'fernandes.junior@ifpr.edu.br',
        'jean.gentilini@ifpr.edu.br'
    ];
    const emailUsuario = "{{ strtolower(Auth::user()->email ?? '') }}";
    const isAdmin = listaAdmins.includes(emailUsuario);

    let modoMultiplo = false; // 🔥 controla o tipo de seleção

    // 🔘 botão de alternar modo
    document.getElementById('btnModo')?.addEventListener('click', function() {
        modoMultiplo = !modoMultiplo;

        this.innerText = modoMultiplo ?
            "Modo múltiplo ATIVO" :
            "Selecionar vários horários";

        this.classList.toggle('ativo');
    });

    function ativarCliqueCelas() {
        const botoes = document.querySelectorAll('.agenda-celula .btn-agendar');

        botoes.forEach(btn => {
            btn.onclick = null; // Limpa eventos anteriores

            btn.addEventListener('click', function(e) {
                e.preventDefault();

                const celula = btn.closest('.agenda-celula');
                const dataISO = btn.getAttribute('data-full-date');
                const hora = celula.dataset.hora;

                const inputData = document.getElementById('date');
                const inputHora = document.getElementById('time');

                // isAdmin deve ser definido no topo do Blade
                if (!isAdmin) {
                    if (inputData) inputData.value = dataISO;
                    if (inputHora) inputHora.value = hora;

                    btn.innerHTML = `<i class="bi bi-ui-checks"></i> Selecionado <br> ${hora}`;
                    mostrarToast("Horário selecionado!");
                    setTimeout(() => fecharModal(), 600);
                } else {
                    // Lógica Admin
                    const item = {
                        data: dataISO,
                        hora: hora
                    };
                    const jaSelecionado = btn.classList.contains('selecionado');

                    // Formata data para exibição (DD/MM)
                    const partes = dataISO.split('-');
                    const dataExibicaoCurta = `${partes[2]}/${partes[1]}`;

                    if (jaSelecionado) {
                        // DESMARCAR
                        horáriosSelecionados = horáriosSelecionados.filter(i =>
                            !(i.data === dataISO && i.hora === hora)
                        );

                        btn.classList.remove('selecionado');
                        btn.style.background = "#d6e8f8";
                        btn.style.color = "#1f4e79";
                        btn.innerHTML =
                            `<i class="bi bi-calendar-check"></i> ${dataExibicaoCurta} <br> Marcar`;
                    } else {
                        // MARCAR
                        if (!modoMultiplo) {
                            // Se não for múltiplo, limpa os outros
                            document.querySelectorAll('.btn-agendar.selecionado').forEach(b => {
                                const dOld = b.getAttribute('data-full-date').split('-');
                                b.classList.remove('selecionado');
                                b.style.background = "#d6e8f8";
                                b.style.color = "#1f4e79";
                                b.innerHTML =
                                    `<i class="bi bi-calendar-check"></i> ${dOld[2]}/${dOld[1]} <br> Marcar`;
                            });
                            horáriosSelecionados = [];
                        }

                        horáriosSelecionados.push(item);
                        btn.classList.add('selecionado');
                        btn.style.background = "#1f4e79";
                        btn.style.color = "white";
                        btn.innerHTML = `<i class="bi bi-check-lg"></i> Selecionado <br> ${hora}`;
                    }

                    // Atualiza inputs (opcional para admin)
                    if (inputData) inputData.value = dataISO;
                    if (inputHora) inputHora.value = hora;
                }
            });
        });
    }
    /* AJAX para atualizar a tabela ==================== */
    function atualizarTabelaAgenda() {
        fetch("{{ route('agenda.semana') }}")
            .then(res => res.json())
            .then(data => {
                const hoje = new Date();
                const diaSemanaAtual = hoje.getDay();
                // Lógica de virada: se for domingo, pula para a próxima segunda
                let diasParaSegunda = (diaSemanaAtual === 0) ? 1 : 1 - diaSemanaAtual;

                const segundaFeira = new Date(hoje);
                segundaFeira.setDate(hoje.getDate() + diasParaSegunda);

                // 1. Limpar e Preencher células com a data correta
                // Dentro do .then(data => { ... })
                document.querySelectorAll('.agenda-celula').forEach(celula => {
                    const diaOffset = parseInt(celula.dataset.dia) - 1;
                    const dataBotao = new Date(segundaFeira);
                    dataBotao.setDate(segundaFeira.getDate() + diaOffset);

                    // Formatação segura YYYY-MM-DD
                    const y = dataBotao.getFullYear();
                    const m = (dataBotao.getMonth() + 1).toString().padStart(2, '0');
                    const d = dataBotao.getDate().toString().padStart(2, '0');
                    const dataISO = `${y}-${m}-${d}`;

                    const dataExibicao = `${d}/${m}/${y}`;

                    celula.innerHTML = `
        <button type="button" class="btn-agendar" data-full-date="${dataISO}">
            <i class="bi bi-calendar-check"></i> ${dataExibicao} <br> Marcar
        </button>`;
                });
                // 2. Marcar células ocupadas (mantendo sua lógica original)
                data.forEach(agendamento => {
                    const partes = agendamento.data_desejada.split('-');
                    const dataAg = new Date(partes[0], partes[1] - 1, partes[2]);
                    const diaSemana = dataAg.getDay();
                    if (diaSemana === 0 || diaSemana > 5) return;

                    const hora = agendamento.horario_desejado.substring(0, 5);
                    const celula = document.querySelector(`[data-dia="${diaSemana}"][data-hora="${hora}"]`);
                    if (celula) {
                        celula.innerHTML = `
                        <button class="btn-ocupado" disabled>
                            <i class="bi bi-x-circle-fill"></i> Ocupado ${hora}
                        </button>`;
                    }
                });

                ativarCliqueCelas();
                abrirModal();
                atualizarDatasCabecalho(); // Chama a função do topo também
            })
            .catch(err => console.error(err));
    }
    /* ===================== Botões ===================== */
    document.getElementById('btnTestarAjax').addEventListener('click', atualizarTabelaAgenda);
    document.getElementById('btnAbrirAgenda').addEventListener('click', atualizarTabelaAgenda);

    /* Inicializa células */
    ativarCliqueCelas();
</script>
<script>
    function atualizarDatasCabecalho() {
        const nomesDias = ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"];
        const hoje = new Date();
        const diaSemanaAtual = hoje.getDay(); // 0 = Domingo, 1 = Segunda...

        // LÓGICA DA VIRADA: 
        // Se for Domingo (0), somamos 1 dia para ir para a próxima segunda.
        // Se for de Segunda (1) a Sábado (6), subtraímos para voltar à segunda desta semana.
        let diasParaSegunda = (diaSemanaAtual === 0) ? 1 : 1 - diaSemanaAtual;

        // Opcional: Se quiseres que a virada ocorra já no SÁBADO, usa esta linha em vez da de cima:
        // let diasParaSegunda = (diaSemanaAtual === 0 || diaSemanaAtual === 6) ? (diaSemanaAtual === 0 ? 1 : 2) : 1 - diaSemanaAtual;

        const segundaFeira = new Date(hoje);
        segundaFeira.setDate(hoje.getDate() + diasParaSegunda);

        document.querySelectorAll('.col-dia').forEach((th, index) => {
            const dataAlvo = new Date(segundaFeira);
            dataAlvo.setDate(segundaFeira.getDate() + index);

            const diaMes = dataAlvo.getDate().toString().padStart(2, '0');
            const mes = (dataAlvo.getMonth() + 1).toString().padStart(2, '0');

            // Atualiza o conteúdo do TH com o Nome + Data
            th.innerHTML =
                `${nomesDias[index]} <br><small style="font-weight: normal; opacity: 0.8;">${diaMes}/${mes}</small>`;
        });
    }
</script>

<style>
   

    /* Ajuste dos ícones dentro dos botões */
    .btn-agendar i,
    .btn-ocupado i {
        margin-right: 4px;
        font-size: 1rem;
        vertical-align: middle;
    }
</style>
