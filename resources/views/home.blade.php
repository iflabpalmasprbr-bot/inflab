@include('layouts.cabecalho')
<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos - IFLAB | IFPR Palmas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>
    <style>
        :root {
            --ifpr-blue: #0056a3;
            --ifpr-light-blue: #0078d4;
            --ifpr-dark-blue: #003d7a;
            --ifpr-gray: #f5f5f5;
            --ifpr-text: #333;
        }

        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .btn-enviar {
            background: linear-gradient(135deg, #007bff, #0056d2);
            color: white;
            border: none;
            padding: 12px 22px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .btn-enviar:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
            background: linear-gradient(135deg, #0069ff, #0043a8);
        }

        .btn-enviar:active {
            transform: scale(0.96);
        }

        body {
            color: var(--ifpr-text);
            overflow-x: hidden;
            background: #eff7ff;
            /* 🔥 impede scroll lateral */
        }

        .service-card {
            text-decoration: none;
            color: #333;
        }

        .btn-bloquear {
            background: linear-gradient(135deg, #ff4b4b, #c82333);
            color: white;
            border: none;
            padding: 12px 22px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .btn-bloquear i {
            font-size: 16px;
        }

        .btn-bloquear:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
            background: linear-gradient(135deg, #ff3a3a, #a71d2a);
        }

        .btn-bloquear:active {
            transform: scale(0.96);
        }

        /* ======================================
   CARROSSEL
====================================== */
        .carousel-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 1px auto;
            padding: 0 25px;
        }

        .carousel-wrapper {
            overflow: hidden;
            border-radius: 20px;
        }

        .carousel-track {
            display: flex;
            gap: 25px;
            transition: transform 0.45s ease-in-out;
            padding: 10px 0;
        }

        .carousel-item {
            min-width: calc(33.333% - 25px);
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07);
            transition: 0.3s;
        }

        .carousel-item:hover {
            transform: translateY(-6px);
        }

        @media (max-width: 600px) {
            .carousel-track {
                gap: 10px;
            }
        }

        @media (max-width: 992px) {
            .carousel-item {
                min-width: calc(50% - 20px);
            }
        }

        @media (max-width: 600px) {
            .carousel-container {
                padding: 0 5px !important;
            }

            .carousel-track {
                gap: 10px;
            }

            .carousel-item {
                min-width: calc(100% - 10px) !important;
            }
        }

        /* ======================================
   BOTÕES DO CARROSSEL
====================================== */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: 2px solid var(--ifpr-light-blue);
            color: var(--ifpr-light-blue);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .carousel-btn:hover {
            background: var(--ifpr-light-blue);
            color: white;
            transform: translateY(-50%) scale(1.08);
        }

        .carousel-btn.prev {
            left: 5px;
        }

        .carousel-btn.next {
            right: 5px;
        }

        @media (max-width: 600px) {
            .carousel-btn {
                width: 38px;
                height: 38px;
                font-size: 18px;
            }

            .carousel-btn.prev {
                left: -5px;
            }

            .carousel-btn.next {
                right: -5px;
            }
        }

        /* ======================================
   CONTAINERS
====================================== */
        .container {
            width: 94%;
            max-width: 1200px;
            margin: auto;
        }

        /* ======================================
   HEADER
====================================== */
        .page-header {
            background: linear-gradient(rgba(0, 86, 163, 0.8), rgba(0, 61, 122, 0.9)),
                url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            padding: 80px 20px;
            text-align: center;
            color: white;
        }

        .page-header h2 {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        @media (max-width: 600px) {
            .page-header h2 {
                font-size: 2rem;
            }
        }

        /* ======================================
   SECTION DEFAULT
====================================== */
        section {
            padding: 70px 0;
        }

        @media (max-width: 600px) {
            section {
                padding: 40px 0;
            }
        }

        /* ======================================
   BOTÃO "CADASTRAR NOVO EVENTO"
====================================== */
        .filter-container {
            width: 100%;
            display: flex;
            justify-content: center;
            /* 🔥 Centraliza */
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 40px;
        }

        /* Botão estilizado */
        .Eventos-btn-componente {
            display: inline-block;
            background: var(--ifpr-light-blue);
            color: #fff;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 120, 212, 0.25);
        }

        .Eventos-btn-componente:hover {
            background: var(--ifpr-dark-blue);
            transform: translateY(-3px);
        }

        @media (max-width: 600px) {
            .Eventos-btn-componente {
                font-size: 0.9rem;
                padding: 10px 22px;
            }
        }

        /* ======================================
   GRID DE EVENTOS
====================================== */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            /* 🔥 nunca estoura */
            gap: 30px;
            width: 100%;
        }

        @media (max-width: 600px) {
            .events-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        .event-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            display: flex;
            flex-direction: column;
        }

        .event-card:hover {
            transform: translateY(-6px);
        }

        /* ======================================
   EVENTO DETALHE
====================================== */
        .event-detail {
            background: var(--ifpr-gray);
            padding: 60px 0;
        }

        .event-detail-container {
            background: white;
            border-radius: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 800px) {
            .event-detail-container {
                grid-template-columns: 1fr;
            }
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    @if (session('success'))
    <div id="mensagem-sucesso" class="mensagem-sucesso">
        <span>{{ session('success') }}</span>
        <button onclick="fecharMensagem()" class="fechar">&times;</button>
    </div>
    @endif

    <style>
        .about {
            background-color: #e3f0ff;
        }

        .mensagem-sucesso {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #007BFF;
            /* azul */
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 300px;
            max-width: 500px;
            font-size: 16px;
            animation: slideDown 0.4s ease;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .mensagem-sucesso.ocultar {
            opacity: 0;
            transform: translate(-50%, -20px);
        }

        .mensagem-sucesso .fechar {
            background: transparent;
            border: none;
            font-size: 20px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            line-height: 1;
            padding: 0;
            margin-left: 20px;
            transition: 0.2s;
        }

        .mensagem-sucesso .fechar:hover {
            color: #d4d4d4;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translate(-50%, -20px);
            }

            to {
                opacity: 1;
                transform: translate(-50%, 0);
            }
        }
    </style>

    <script>
        function fecharMensagem() {
            const mensagem = document.getElementById('mensagem-sucesso');
            mensagem.classList.add('ocultar');
            setTimeout(() => {
                mensagem.remove();
            }, 500); // remove do DOM após a transição
        }

        // Fecha automaticamente após 4 segundos
        window.addEventListener('DOMContentLoaded', () => {
            const mensagem = document.getElementById('mensagem-sucesso');
            if (mensagem) {
                setTimeout(() => {
                    fecharMensagem();
                }, 3000); // 3000ms = 4s
            }
        });
    </script>

    <section class="hero">
        <div class="container">
            <h2>teste - Laboratório de Fabricação, Robótica e Prototipagem</h2>
            <p>Um espaço inovador para desenvolvimento de projetos, experimentação e aprendizado prático em tecnologias
                de fabricação digital, robótica e eletrônica.</p>

            <!-- Ícone azul do chat -->
            @auth
            <!-- Usuário logado: vai para o chat -->
            <a href="{{ route('forum.index') }}" class="chat-float" title="Abrir Chat">
                <i class="fas fa-comment-dots"></i>
            </a>
            @else
            <!-- Usuário não logado: vai para login -->
            <a href="{{ route('login') }}" class="chat-float" title="Faça login para acessar o chat">
                <i class="fas fa-comment-dots"></i>
            </a>
            @endauth

            <a href="#agendamento" class="btn-primary">Agende seu uso</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="sobre" class="about">
        <div class="container">
            <div class="section-title">
                <h2>Sobre o IFLAB</h2>
                <p>Conheça nossa história, propósito e infraestrutura</p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <h3>Inovação e Tecnologia ao seu alcance</h3>
                    <p>O IFLAB foi construído em 2016 como um ambiente multidisciplinar destinado a apoiar projetos de
                        Ensino, Pesquisa e Extensão do IFPR Campus Palmas.</p>
                    <p>Nosso laboratório integra as áreas de robótica, Tecnologias da Informação e Comunicação (TICs), e
                        a Cultura Maker e DIY (Do It Yourself), proporcionando um espaço para experimentação,
                        prototipagem e desenvolvimento de soluções tecnológicas.</p>
                    <p>Com equipamentos de última geração, o IFLAB atende tanto a comunidade acadêmica interna quanto a
                        comunidade externa, fomentando a inovação e o empreendedorismo na região.</p>
                </div>
                <div class="about-image">
                    <img src="https://integra.ifrr.edu.br/api/portfolio/infraestrutura/foto/jpg/47"
                        alt="Laboratório IFLAB">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicos" class="services">
        <div class="container">
            <div class="section-title">
                <h2>Serviços e Recursos</h2>
                <p>Conheça nossos equipamentos e áreas de atuação</p>

            </div>
            <div class="services-grid">

                <a href="{{ url('maquinas') }}" class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="service-content">
                        <h3>Manufatura Digital</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Router CNC</li>
                            <li><i class="fas fa-check-circle"></i> Impressoras 3D (FDM e Resina)</li>
                            <li><i class="fas fa-check-circle"></i> Cortadora a Laser</li>
                            <li><i class="fas fa-check-circle"></i> Plotter de Recorte</li>
                        </ul>
                    </div>
                </a>

                <a href="{{ url('eletronica') }}" class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="service-content">
                        <h3>Eletrônica</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Eletrônica Analógica</li>
                            <li><i class="fas fa-check-circle"></i> Eletrônica Digital</li>
                            <li><i class="fas fa-check-circle"></i> Plataformas Arduino e Raspberry</li>
                            <li><i class="fas fa-check-circle"></i> Instrumentos de Medição</li>
                        </ul>
                    </div>
                </a>

                <a href="{{ url('robotica') }}" class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="service-content">
                        <h3>Robótica</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Robôs Educacionais</li>
                            <li><i class="fas fa-check-circle"></i> Kits de Robótica</li>
                            <li><i class="fas fa-check-circle"></i> Sensores e Atuadores</li>
                            <li><i class="fas fa-check-circle"></i> Programação e Controle</li>
                        </ul>
                    </div>
                </a>

                <a href="{{ url('marcenaria') }}" class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <div class="service-content">
                        <h3>Marcenaria</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Serras de Mesa e Fita</li>
                            <li><i class="fas fa-check-circle"></i> Furadeira de Coluna</li>
                            <li><i class="fas fa-check-circle"></i> Lixadeira</li>
                            <li><i class="fas fa-check-circle"></i> Plaina Desengrossadeira</li>
                        </ul>
                    </div>
                </a>

                <a href="{{ url('usinagem') }}" class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-fire-alt"></i>
                    </div>
                    <div class="service-content">
                        <h3>Usinagem e Solda</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Torno Mecânico</li>
                            <li><i class="fas fa-check-circle"></i> Fresadora</li>
                            <li><i class="fas fa-check-circle"></i> Solda Elétrica</li>
                            <li><i class="fas fa-check-circle"></i> Solda MIG/MAG</li>
                        </ul>
                    </div>
                </a>

                <a href="{{ route('comunidade') }}" class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="service-content">
                        <h3>Atendimento à Comunidade</h3>
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Projetos Acadêmicos</li>
                            <li><i class="fas fa-check-circle"></i> Projetos de Pesquisa</li>
                            <li><i class="fas fa-check-circle"></i> Projetos de Extensão</li>
                            <li><i class="fas fa-check-circle"></i> Parcerias Externas</li>
                        </ul>
                    </div>
                </a>

            </div>

    </section>
    <!--Eventos-->
    <style>
        .services {
            background: #c2dcff;
            /* 🔵 Exemplo: azul bem claro */
        }

        .eventos-titulo {
            text-align: center;
            font-size: 34px;
            font-weight: 800;
            margin-top: 8px;
            margin-bottom: 35px;
            color: #2c66b2;
            font-family: "Poppins", sans-serif;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .eventos-titulo::after {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #0055ff, #00c4ff);
            border-radius: 10px;
            display: block;
        }

        .card-link {
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
            /* 🔥 faz o link ocupar o card inteiro */
        }

        .card-link:hover {
            transform: translateY(-6px);
        }

        #eventos {
            background: #ddecffe0;
            /* cinza claro */
            padding: 60px 0;
        }
    </style>
    <section id="eventos">
        <div class="section-title">
            <h2>Eventos IFlab</h2>
            <p>Fique por dentro do que acontece no IFlab</p>
        </div>
        <div class="carousel-container">

            <button class="carousel-btn prev">&#10094;</button>

            <div class="carousel-wrapper">
                <div class="carousel-track">

                    @foreach ($eventos as $evento)
                    <a href="{{ route('eventos.show', $evento->id) }}" class="carousel-item event-card card-link"
                        data-category="{{ $evento->categoria }}">

                        <div class="event-image">
                            @if ($evento->imagem && Storage::disk('public')->exists($evento->imagem))
                            <img src="{{ Storage::url($evento->imagem) }}" alt="{{ $evento->titulo }}">
                            @else
                            <div class="placeholder">Sem imagem</div>
                            @endif
                        </div>

                        <div class="event-content">
                            <span class="event-date">
                                {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}
                                às {{ \Carbon\Carbon::parse($evento->hora_evento)->format('H:i') }}
                            </span>
                            <h3>{{ $evento->titulo }}</h3>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
            <button class="carousel-btn next">&#10095;</button>

        </div>
        <div class="filter-container">
            @auth
            <!-- Verificação de usuário para adicionar evento -->
            @if (strtolower(Auth::user()->email) === 'carolbrm265@gmail.com' ||
            strtolower(Auth::user()->email) === 'fernandes.junior@ifpr.edu.br' ||
            strtolower(Auth::user()->email) === 'jean.gentilini@ifpr.edu.br')
            <a href="{{ route('eventos.create') }}" class="Eventos-btn-componente">
                Cadastrar Novo Evento
            </a>
            @endif
            @endauth
        </div>
    </section>

    <!-- Booking Section -->
    <!-- Booking Section -->
    <section id="agendamento" class="booking">
        <div class="container">
            <div class="section-title">
                <h2>Como Agendar</h2>
                <p>Siga os passos abaixo para reservar nossos equipamentos e serviços</p>

                <div class="booking-steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-text">
                            <strong>Preencha seus dados pessoais</strong>
                            <p>Informe seus dados para que possamos entrar em contato e processar sua reserva.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-text">
                            <strong>Escolha o serviço e categoria</strong>
                            <p>Selecione o serviço desejado e a categoria correspondente para seu projeto.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-text">
                            <strong>Selecione data e horário</strong>
                            <p>Escolha a data e horário mais conveniente para a execução do serviço.</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-text">
                            <strong>Descreva seu projeto e envie</strong>
                            <p>Forneça detalhes do seu projeto para que possamos preparar tudo adequadamente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* CSS para o texto explicativo */
        .help-text {
            font-size: 0.875rem;
            /* tamanho menor que o normal */
            color: #6c757d;
            /* cinza suave */
            margin-top: 4px;
            /* espaço acima */
            margin-bottom: 8px;
            /* espaço abaixo */
            font-style: italic;
            /* deixa em itálico */
        }

        #mensagem-sucesso {
            display: none;
            /* inicialmente escondida */
            margin-top: 20px;
            text-align: center;
            background-color: #d1ecf1;
            /* azul claro */
            border: 1px solid #bee5eb;
            /* borda azul suave */
            color: #12545f;
            /* texto azul escuro */
            padding: 15px 20px;
            border-radius: 10px;
            font-size: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
            /* animação ao aparecer */
        }

        /* Animação de fade */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsividade */
        @media (max-width: 480px) {
            #mensagem-sucesso {
                font-size: 14px;
                padding: 12px 15px;
            }
        }

        /* Botão opcional de fechar */
        #mensagem-sucesso .fechar {
            display: inline-block;
            margin-left: 10px;
            cursor: pointer;
            color: #0c5460;
            font-weight: bold;
            transition: color 0.3s;
        }

        #mensagem-sucesso .fechar:hover {
            color: #000;
        }

        .booking-steps {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .booking {
            background-color: #eff7ff;
        }

        .booking-steps .step {
            flex: 1;
            min-width: 220px;
            background: #ffffff;
            /* fundo branco */
            border-radius: 15px;
            text-align: center;
            padding: 30px 20px;
            margin: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            /* sombra leve */
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: #145c93;
            /* azul número */
            color: #ffffff;
            font-weight: bold;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
        }

        .step-text strong {
            display: block;
            color: #003366;
            /* azul escuro */
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .step-text p {
            font-size: 0.95rem;
            color: #555555;
            line-height: 1.4;
            margin: 0;
        }

        /* Mobile */
        @media(max-width: 768px) {
            .booking-steps {
                flex-direction: column;
                align-items: center;
            }

            .booking-steps .step {
                width: 85%;
            }
        }
    </style>

    <div class="booking-form">

        <!-- Aviso acima do formulário de agendamento -->
        <div class="alert-agendamento">
            <strong class="strong-1">Atenção:</strong> Após enviar seu agendamento, fique de olho na <em>barra de
                notificações</em>.
            Seu pedido ficará com o status <span class="status-aberto">Em Análise (Aberto)</span>.
            Assim que o professor responsável aprovar ou recusar, o status será atualizado, e seu horário aparecerá na
            tabela de agendamentos.
        </div>

        <style>
            .strong-1 {
                color: rgb(51, 51, 51);
            }

            .alert-agendamento {
                background-color: #fff3cd;
                /* amarelo claro */
                border: 1px solid #ffeeba;
                /* borda amarela */
                color: #725a17;
                /* texto escuro */
                padding: 15px 20px;
                border-radius: 8px;
                font-size: 0.95rem;
                margin-bottom: 25px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            }

            .alert-agendamento .status-aberto {
                font-weight: bold;
                color: #0004d3;
            }

            @media (max-width: 600px) {
                .alert-agendamento {
                    font-size: 0.9rem;
                    padding: 12px 15px;
                }
            }
        </style>
        <style>
            .mensagem-sucesso {
                position: fixed;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #0078d4;
                /* azul IFPR */
                color: white;
                padding: 16px 24px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: space-between;
                font-size: 16px;
                animation: slideDown 0.4s ease;
                transition: opacity 0.5s ease, transform 0.5s ease;
            }

            .mensagem-sucesso.ocultar {
                opacity: 0;
                transform: translate(-50%, -20px);
            }

            .mensagem-sucesso .fechar {
                background: transparent;
                border: none;
                font-size: 20px;
                color: white;
                cursor: pointer;
                font-weight: bold;
                line-height: 1;
                margin-left: 20px;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translate(-50%, -20px);
                }

                to {
                    opacity: 1;
                    transform: translate(-50%, 0);
                }
            }

            .explicacao {
                color: red;
                font-size: 14px;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 200;
                text-align: justify;
                margin-top: 1.5%;
            }
        </style>
        <div id="mensagem-sucesso" class="mensagem-sucesso" style="display:none;">
            Seu agendamento foi enviado com sucesso!
            <button onclick="fecharMensagem()" class="fechar">&times;</button>
        </div>
        <h3 style="text-align: center; color: #0056a3; margin-bottom: 30px;">Formulário de Agendamento</h3>

        <form id="bookingForm" action="{{ route('agendamento.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Nome Completo</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    @if(Auth::check())
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select id="category" name="category" required>
                        <option value="">Selecione</option>
                        <option value="student">Estudante IFPR</option>
                        <option value="teacher">Professor IFPR</option>
                        <option value="external">Comunidade Externa</option>
                        <option value="research">Projeto de Pesquisa</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="service">Serviço Desejado</label>
                <select id="service" name="service" required>
                    <option value="">Selecione o serviço</option>
                    <option value="cnc">Router CNC</option>
                    <option value="3d">Impressão 3D</option>
                    <option value="laser">Corte a Laser</option>
                    <option value="eletronics">Eletrônica</option>
                    <option value="robotics">Robótica</option>
                    <option value="woodwork">Marcenaria</option>
                    <option value="machining">Usinagem</option>
                    <option value="welding">Solda</option>
                    <option value="other">Outro</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="date">Data Desejada</label>
                    <input type="date" id="date" name="date" required readonly>
                    <small class="form-text text-muted">
                        Este campo será preenchido conforme o calendário semanal. Escolha a data desejada.
                    </small>
                </div>
                <div class="form-group">
                    <label for="time">Horário Desejado</label>
                    <input type="time" id="time" name="time" required readonly>
                    <small class="form-text text-muted">
                        este campo sera prenchido conforme o calendário semanal. Escolha a hora desejada.
                    </small>
                </div>
            </div>
            <button id="btnTestarAjax" class="btn btn-primary mb-3">
                <i class="bi bi-calendar-event"></i> calendário semanal
            </button>
            <div class="form-group">
                <label for="project">Descrição do Projeto</label>
                <textarea id="project" name="project"
                    placeholder="Descreva brevemente seu projeto, objetivos e o que você pretende produzir no laboratório..." required></textarea>
            </div>
            <input type="text" name="status" id="status" value="Aberto" hidden>
            <div style="text-align: center;">
                <button type="submit" class="btn-enviar">
                    <i class="fa-solid fa-paper-plane"></i>
                    Enviar Solicitação
                </button>
                @auth
                @if (strtolower(Auth::user()->email) === 'carolbrm265@gmail.com' ||
                strtolower(Auth::user()->email) === 'fernandes.junior@ifpr.edu.br' ||
                strtolower(Auth::user()->email) === 'jean.gentilini@ifpr.edu.br')

                <button type="button" id="btnBloquearHorario" class="btn-bloquear">
                    <i class="fa-solid fa-lock"></i>
                    Bloquear Horário
                </button>
                <h6 class="explicacao">O recurso de bloqueio de horário serve para preencher automaticamente uma espécie de “ficha” e enviar o horário escolhido como aceito, atualizando a página em seguida.</h6>

                @endif
                @endauth
                <script>
                    document.getElementById('btnBloquearHorario').addEventListener('click', async function() {
                        // 1. Verifica se temos horários selecionados no array global
                        // Se o array estiver vazio, tenta pegar o que estiver nos inputs (caso o admin tenha clicado em apenas um)
                        if (typeof horáriosSelecionados === 'undefined' || horáriosSelecionados.length === 0) {
                            const d = document.getElementById('date').value;
                            const h = document.getElementById('time').value;
                            if (d && h && h !== "--:--" && !d.includes("Múltiplos")) {
                                horáriosSelecionados = [{
                                    data: d,
                                    hora: h
                                }];
                            }
                        }

                        if (horáriosSelecionados.length === 0) {
                            alert("Por favor, selecione ao menos um horário no calendário primeiro.");
                            return;
                        }

                        // 2. Feedback visual de carregamento
                        const btn = this;
                        const originalText = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Bloqueando ${horáriosSelecionados.length} horários...`;

                        // 3. Dados padrão para o bloqueio
                        const token = document.querySelector('input[name="_token"]').value;
                        const url = "{{ route('agendamento.store') }}";

                        // 4. Loop de envio (um por um para aproveitar sua rota .store atual)
                        try {
                            for (const item of horáriosSelecionados) {
                                const formData = new FormData();
                                formData.append('_token', token);
                                formData.append('name', "HORÁRIO BLOQUEADO");
                                formData.append('email', "admin@iflab.com");
                                formData.append('phone', "000000000");
                                formData.append('category', "teacher");
                                formData.append('service', "other");
                                formData.append('project', "Bloqueio administrativo em lote");
                                formData.append('date', item.data);
                                formData.append('time', item.hora);
                                formData.append('status', "Aceito"); // Garante que apareça no calendário

                                await fetch(url, {
                                    method: "POST",
                                    body: formData,
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                });
                            }

                            // 5. Sucesso final
                            alert("Bloqueios realizados com sucesso!");
                            window.location.reload();

                        } catch (error) {
                            console.error("Erro no bloqueio:", error);
                            alert("Ocorreu um erro ao processar um dos horários.");
                            btn.disabled = false;
                            btn.innerHTML = originalText;
                        }
                    });
                </script>
            </div>
            {{-- Div para mensagem de confirmação --}}

    </div>

    </form>


    <script>
        document.getElementById('bookingForm').addEventListener('submit', function() {
            const msg = document.getElementById('mensagem-sucesso');
            msg.style.display = 'flex'; // mostra a mensagem
            setTimeout(() => msg.style.display = 'none', 3000); // some após 3s
        });
    </script>
    <script>
        document.getElementById('form-agendamento').addEventListener('submit', function(event) {
            // Evita envio tradicional para demonstrar a mensagem
            // event.preventDefault(); // descomente se quiser apenas mensagem sem enviar para backend

            // Exibe a mensagem de sucesso
            document.getElementById('mensagem-sucesso').style.display = 'block';

            // Opcional: scroll até a mensagem
            document.getElementById('mensagem-sucesso').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
    <style>
        .booking-form {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            max-width: 800px;
            margin: 45px auto;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .booking-form .form-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .booking-form .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .booking-form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .booking-form input,
        .booking-form select,
        .booking-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .booking-form textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn-primary {
            background: #0078d4;
            color: white;
            padding: 12px 28px;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #0056a3;
        }

        @media(max-width: 600px) {
            .booking-form .form-row {
                flex-direction: column;
            }
        }

        #contato {
            background-color: #9bc6ff;
        }
    </style>


    <!-- Contact Section -->
    <section id="contato" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contato</h2>
                <p>Entre em contato conosco para mais informações</p>
            </div>

            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Endereço</h3>
                    <p>IFPR Campus Palmas<br>
                        Rua Pioneiro, 2153 - Jardim Dallas<br>
                        Palmas - PR, 85555-000</p>
                </div>

                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <h3>Telefone</h3>
                    <p>(46) 3265-4300<br>
                        Ramal: 4305 (IFLAB)</p>
                </div>

                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <h3>E-mail</h3>
                    <p>infolab.palmas@ifpr.edu.br<br>
                        iflab.palmas@ifpr.edu.br</p>
                </div>

                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <h3>Horário de Funcionamento</h3>
                    <p>Segunda a Sexta: 08h00 às 22h00<br>
                        Sábado: 08h00 às 12h00</p>
                </div>
            </div>
        </div>
    </section>

    <script defer>
        const track = document.querySelector('.carousel-track');
        const items = document.querySelectorAll('.carousel-item');
        const prevBtn = document.querySelector('.carousel-btn.prev');
        const nextBtn = document.querySelector('.carousel-btn.next');

        let index = 0;

        function getItemsPerView() {
            const width = window.innerWidth;
            if (width <= 600) return 1;
            if (width <= 992) return 2;
            return 3;
        }

        function updateCarousel() {
            const itemsPerView = getItemsPerView();
            const itemStyle = getComputedStyle(items[0]);
            const itemWidth = items[0].offsetWidth + parseInt(itemStyle.marginRight);
            track.style.transform = `translateX(-${index * itemWidth}px)`;
            // Ajusta index se ultrapassar
            if (index > items.length - itemsPerView) index = items.length - itemsPerView;
            if (index < 0) index = 0;
        }

        nextBtn.addEventListener('click', () => {
            const itemsPerView = getItemsPerView();
            if (index < items.length - itemsPerView) {
                index++;
                updateCarousel();
            }
        });

        prevBtn.addEventListener('click', () => {
            if (index > 0) {
                index--;
                updateCarousel();
            }
        });

        window.addEventListener('resize', updateCarousel);

        // Inicializa
        updateCarousel();
    </script>
    @include('layouts.footer')
    @include('home_partials.modal_agendamentos')


</body>