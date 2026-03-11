{{-- coloque isto no seu arquivo Blade (ex: resources/views/maquinas.blade.php) --}}
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Máquinas e Recursos | IFLAB - IFPR Palmas</title>

    <!-- FONTES (apenas fontes, sem dependência de ícones externos) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f5f7fa;
            margin: 0;
        }

        /* ===== BOTÃO VOLTAR SUPERIOR ===== */
        .top-voltar {
            width: 100%;
            max-width: 1200px;
            margin: 15px auto 0 auto;
            padding: 0 15px;
            display: flex;
            justify-content: flex-start;
        }

        .btn-left {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #0a6cc4;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 15px;
        }

        .btn-left:hover {
            background: #084f91;
            transform: translateX(-3px);
        }

        /* SVG ícone */
        .icon-left {
            width: 16px;
            height: 16px;
            display: inline-block;
            flex-shrink: 0;
            color: white;
            /* usa currentColor no SVG */
        }

        /* ===== TÍTULO PRINCIPAL ===== */
        h1.page-title {
            text-align: center;
            font-weight: 800;
            color: #0a6cc4;
            margin-top: 12px;
            margin-bottom: 5px;
            font-size: 42px;
            letter-spacing: -1px;
        }

        p.page-subtitle {
            text-align: center;
            font-size: 18px;
            color: #4b4b4b;
            margin-top: 0;
            margin-bottom: 45px;
        }

        /* ===== GRID DE CARDS ===== */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto 50px auto;
            padding: 0 15px;
        }

        .machine-box {
            background: white;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .machine-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
        }

        .machine-box img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .box-title {
            background: #0a6cc4;
            color: white;
            padding: 15px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            width: 100%;
        }

        .box-text {
            padding: 15px;
            font-size: 15px;
            color: #333;
            line-height: 1.5;
            width: 100%;
        }

        /* ===== BOTÃO VOLTAR INFERIOR ===== */
        .bottom-voltar-container {
            width: 100%;
            text-align: center;
            margin-bottom: 40px;
        }

        .bottom-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 28px;
            background: #0a6cc4;
            color: white;
            font-weight: 700;
            border-radius: 12px;
            text-decoration: none;
            font-size: 17px;
            transition: 0.3s;
        }

        .bottom-btn:hover {
            background: #084f91;
            transform: translateY(-3px);
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 1024px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            .grid-container {
                grid-template-columns: 1fr;
            }

            .btn-left {
                padding: 6px 14px;
                font-size: 14px;
            }

            .bottom-btn {
                width: 80%;
            }
        }
    </style>
</head>

<body>

    {{-- Inclua seu cabeçalho layout aqui (se necessário) --}}
    @include('layouts.cabecalho')
    <h1 class="page-title">ELETRÔNICA</h1>

    <p class="page-subtitle">
        Infraestrutura tecnológica do IFPR Palmas para inovação, prototipagem e pesquisa aplicada
    </p>

    <div class="grid-container">

        <!-- OSCILOSCÓPIO -->
        <div class="machine-box">
            <img src="https://blog.instrusul.com.br/wp-content/uploads/2018/11/oscilosc%C3%B3pio.jpg"
                alt="Osciloscópio">
            <div class="box-title">Osciloscópio</div>
            <div class="box-text">
                Um osciloscópio é um instrumento de medição usado para visualizar sinais elétricos
            </div>
        </div>

        <!-- GERADOR -->
        <div class="machine-box">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/NoN_DF1641A_Function_Generator.jpg"
                alt="Gerador">
            <div class="box-title">Gerador de Funções</div>
            <div class="box-text">
                Um gerador de funções é um instrumento que produz sinais periódicos
            </div>
        </div>

        <!-- FONTE -->
        <div class="machine-box">
            <img src="https://lojagoldentec.vteximg.com.br/arquivos/ids/158174-600-600/29726-01.jpg?v=637684580111170000"
                alt="Fonte">
            <div class="box-title">Fonte de Alimentação</div>
            <div class="box-text">
                Uma fonte de alimentação fornece energia estável e controlada
            </div>
        </div>

        <!-- ESTAÇÃO -->
        <div class="machine-box">
            <img src="https://www.usinainfo.com.br/1013779/estacao-de-solda-e-retrabalho-yaxun-702b-902-2-em-1-de-uso-industrial-127v.jpg"
                alt="Estação">
            <div class="box-title">Estação de Solda</div>
            <div class="box-text">
                Uma estação usada para soldagem de componentes eletrônicos com precisão
            </div>
        </div>

        <!-- CÂMERA -->
        <div class="machine-box">
            <img src="https://images.tcdn.com.br/img/img_prod/671371/camera_termografica_19_200_pixels_com_nuvem_ignite_flir_e5_pro_3931_1_5825dabde888f0ab21c3d69f467fc1d5.jpeg"
                alt="Câmera">
            <div class="box-title">Câmera Termográfica</div>
            <div class="box-text">
                Detecta distribuição de temperatura por imagens infravermelhas
            </div>
        </div>

    </div>

    <!-- BOTÃO VOLTAR INFERIOR (também com SVG) -->
    <div class="bottom-voltar-container">
        <a href="{{ route('home') }}#servicos" class="bottom-btn" aria-label="Voltar ao início">
            <svg class="icon-left" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
            Voltar ao Início
        </a>
    </div>

    @include('layouts.footer')

</body>

</html>
