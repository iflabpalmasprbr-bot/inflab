@include('layouts.cabecalho')

<div class="page-wrapper">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ===== BOTÃO VOLTAR ===== -->
    <div class="linha-voltar">
        <a href="{{ route('home') }}" class="btn btn-voltar">← Voltar para Home</a>
    </div>
    @php
        $specialEmails = ['fernandes.junior@ifpr.edu.br', 'jean.gentilini@ifpr.edu.br', 'carolbrm265@gmail.com'];
        $userEmail = strtolower(Auth::user()->email);
        $showAll = in_array($userEmail, $specialEmails);
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



            @foreach ($agendamentos as $ag)
                @if ($showAll || strtolower($ag->email) == $userEmail)
                    <div class="agendamento-card">
                        <h3 class="agendamento-nome">{{ $ag->nome }}</h3>

                        <div class="agendamento-info">
                            <p><strong>E-mail:</strong> {{ $ag->email }}</p>
                            <p><strong>Telefone:</strong> {{ $ag->telefone }}</p>
                            <p><strong>Categoria:</strong> {{ $ag->categoria }}</p>
                            <p><strong>Serviço:</strong> {{ $ag->servico }}</p>
                            <p><strong>Data:</strong>
                                {{ \Carbon\Carbon::parse($ag->data_desejada)->format('d/m/Y') }}
                            </p>
                            <p><strong>Hora:</strong> {{ $ag->horario_desejado }}</p>
                            <p><strong>Projeto:</strong> {{ $ag->descricao_projeto }}</p>
                            <p>
                                <strong>Status:</strong>

                                <span
                                    class="
        @if (strtolower($ag->status) == 'aceito') status-aceito 
        @elseif(strtolower($ag->status) == 'recusado') status-recusado 
        @elseif(strtolower($ag->status) == 'em andamento') status-andamento @endif
    ">
                                    {{ $ag->status }}
                                </span>
                            </p>
                        </div>
                    </div>
                @endif

                @if (in_array(strtolower(Auth::user()->email), [
                        'fernandes.junior@ifpr.edu.br',
                        'jean.gentilini@ifpr.edu.br',
                        'carolbrm265@gmail.com',
                    ]))
                    <!-- ===== BOTÕES ===== -->

                    <div class="agendamento-actions">
                        <input type="checkbox" class="selecionar-agendamento" data-id="{{ $ag->id }}">
                        Selecionar

                        <button class="btn-aceitar" data-id="{{ $ag->id }}">
                            <i class="fa fa-check"></i> Aceitar
                        </button>

                        <button class="btn-recusar" data-id="{{ $ag->id }}">
                            <i class="fa fa-times"></i> Recusar
                        </button>

                        <button class="btn-excluir" data-id="{{ $ag->id }}">Excluir</button>

                    </div>
                @endif
            @endforeach
        </div>


</div>
@endif


</div>
<script defer>
    document.querySelectorAll('.btn-excluir').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');

            if (confirm('Deseja realmente excluir este agendamento?')) {
                fetch('{{ route('agendamento.excluir') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: [id] // enviar como array
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert('Agendamento excluído!');
                            this.closest('.agendamento-card')
                                .remove(); // remove o card sem recarregar a página
                        } else {
                            alert('Erro ao excluir!');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Erro na requisição!');
                    });
            }
        });
    });

    document.querySelectorAll('.btn-aceitar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Deseja aceitar este agendamento?')) {
                fetch('{{ route('agendamento.aceitar') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: [id]
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert('Agendamento aceito!');
                            this.closest('.agendamento-card').remove();
                        } else {
                            alert('Erro ao aceitar o agendamento!');
                        }
                    })
                    .catch(() => alert('Erro na requisição!'));
            }
        });
    });

    document.querySelectorAll('.btn-recusar').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Deseja recusar este agendamento?')) {
                fetch('{{ route('agendamento.recusar') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: [id]
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert('Agendamento recusado!');
                            this.closest('.agendamento-card').remove();
                        } else {
                            alert('Erro ao recusar o agendamento!');
                        }
                    })
                    .catch(() => alert('Erro na requisição!'));
            }
        });
    });
</script>



<style>
    .status-aceito {
        color: green;
        font-weight: bold;
    }

    .status-recusado {
        color: red;
        font-weight: bold;
    }

    .status-andamento {
        color: blue;
        font-weight: bold;
    }

    /* Container do formulário */
    form.minha-form-class {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        margin: 20px 0;
    }


    /* Campos de data */
    form input[type="date"] {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        transition: border-color 0.3s;
    }

    /* Foco nos inputs */
    form input[type="date"]:focus {
        border-color: #007bff;
        /* azul claro */
        outline: none;
    }

    /* Botão de busca */
    form button {
        padding: 8px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    /* Hover no botão */
    form button:hover {
        background-color: #0056b3;
    }

    /* Responsividade */
    @media (max-width: 480px) {
        form {
            flex-direction: column;
            align-items: stretch;
        }

        form input[type="date"],
        form button {
            width: 100%;
        }
    }

    /* --- Layout Geral --- */
    .page-wrapper {
        max-width: 1100px;
        margin: auto;
        padding: 20px 25px;
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background-color: #f9f9f9;
    }

    /* ===== BOTÃO VOLTAR ===== */
    .linha-voltar {
        margin-bottom: 20px;
    }

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

    /* --- Título da Página --- */
    .titulo-pagina {
        color: #004a8f;
        font-size: 30px;
        margin-bottom: 30px;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .nenhum {
        font-size: 17px;
        color: #666;
        text-align: center;
        margin-top: 40px;
    }

    /* --- Lista de Cards --- */
    .agendamento-container {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    /* --- Card Individual --- */
    .agendamento-card {
        background: #fff;
        border-radius: 16px;
        padding: 25px;
        border-left: 5px solid #285991;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: 0.3s ease-in-out;
        width: 100%;
    }

    .agendamento-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    /* --- Título do Card --- */
    .agendamento-nome {
        margin-bottom: 15px;
        font-size: 22px;
        color: #1c3c73;
        font-weight: 600;
    }

    /* --- Conteúdo do Card --- */
    .agendamento-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px 20px;
    }

    .agendamento-info p {
        margin: 5px 0;
        font-size: 15px;
        color: #333;
    }

    .agendamento-info strong {
        color: #004a8f;
    }

    /* Responsivo */
    @media (max-width: 600px) {
        .agendamento-card {
            padding: 18px;
        }

        .agendamento-nome {
            font-size: 20px;
        }

        .agendamento-info {
            grid-template-columns: 1fr;
        }

        .btn {
            width: 100%;
            text-align: center;
        }
    }

    .agendamento-actions {
        margin-top: 15px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .btn-excluir {
        padding: 8px 16px;
        font-size: 14px;
        background-color: #c0392b;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-excluir:hover {
        background-color: #e74c3c;
    }

    .btn-aceitar {
        padding: 8px 16px;
        font-size: 14px;
        background-color: #27ae60;
        /* verde */
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-aceitar:hover {
        background-color: #2ecc71;
    }

    .agendamento-info p {
        word-wrap: break-word;
    }

    @media (max-width: 480px) {
        .agendamento-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .agendamento-actions button,
        .agendamento-actions input[type="checkbox"] {
            width: 100%;
        }
    }

    @media (max-width: 360px) {
        .agendamento-card {
            padding: 12px;
        }
    }

    .btn-recusar {
        padding: 8px 16px;
        font-size: 14px;
        background-color: #e67e22;
        /* laranja */
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-recusar:hover {
        background-color: #d35400;
    }

    .btn-aceitar i,
    .btn-recusar i {
        margin-right: 6px;
    }
</style>
