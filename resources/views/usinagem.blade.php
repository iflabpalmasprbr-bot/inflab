<!doctype html>
<html lang="pt-BR">

<head>
    @include('layouts.cabecalho')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Máquinas e Recursos | IFLAB - IFPR Palmas</title>

    <!-- FONTES E ÍCONES -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f5f7fa;
            margin: 0;
        }

        /* ===== TÍTULO PRINCIPAL ===== */
        h1.page-title {
            text-align: center;
            font-weight: 800;
            color: #0a6cc4;
            margin-top: 25px;
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
        .machines-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 colunas no desktop */
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto 50px auto;
            padding: 0 15px;
        }

        /* ===== CARD ===== */
        .machine-box {
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
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

        .box-content {
            padding: 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .box-title {
            background: #0a6cc4;
            color: white;
            padding: 15px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            letter-spacing: 1px;
            border-radius: 10px 10px 0 0;
        }

        .box-text {
            margin-top: 12px;
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            flex: 1;
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 992px) {
            .machines-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .machines-container {
                grid-template-columns: 1fr;
            }
        }

        .top-bar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
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

        .top-title {
            font-size: 42px;
            font-weight: 800;
            color: #0a6cc4;
            letter-spacing: -1px;
            margin: 0;
        }

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
    <h1 class="page-title">Usinagem e Solda</h1>
    <p class="page-subtitle"> Infraestrutura tecnológica do IFPR Palmas para inovação, prototipagem e pesquisa aplicada
    </p>

    <div class="machines-container">
        <!-- TORNO MECÂNICO -->
        <div class="machine-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8nuBAO6Iz4qOXWEO6neMOhJoTaQzNholIcw&s">
            <div class="box-content">
                <div class="box-title">TORNO MECÂNICO</div>
                <div class="box-text">
                    Um torno mecânico é uma máquina utilizada para usinar peças cilíndricas por meio da rotação do
                    material contra uma ferramenta de corte. Permite realizar operações como desbaste, acabamento,
                    roscas, furos e cortes precisos em metais, plásticos e outros materiais. É essencial em oficinas
                    mecânicas, indústrias e manutenção para fabricar e ajustar componentes com alta precisão.
                </div>
            </div>
        </div>

        <!-- FURADEIRA FRESADORA -->
        <div class="machine-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZPYHwW6UaMPHGh3ykNk5kAD-vvsxY2w9e7g&s">
            <div class="box-content">
                <div class="box-title">FURADEIRA FRESADORA</div>
                <div class="box-text">
                    Uma furadeira fresadora é uma máquina versátil que combina as funções de furar e fresar, permitindo
                    realizar furos precisos e usinar superfícies, ranhuras e contornos em metais e outros materiais.
                    Possui mesa ajustável, cabeçote móvel e controle de velocidade, oferecendo precisão e estabilidade
                    nos processos de usinagem leve a média. É muito utilizada em oficinas mecânicas, ferramentarias e
                    laboratórios de manufatura.
                </div>
            </div>
        </div>

        <!-- SERRA FITA DE BANCADA -->
        <div class="machine-box">
            <img src="https://www.agrotama.com.br/upload/novo_produtos/serrafitadebancadaparamadeira60hz_102040548.jpg">
            <div class="box-content">
                <div class="box-title">SERRA FITA DE BANCADA</div>
                <div class="box-text">
                    Uma serra fita de bancada é uma máquina estacionária equipada com uma lâmina contínua em forma de
                    fita, usada para realizar cortes retos, curvos e irregulares em madeira, plástico e alguns tipos de
                    metal. Oferece precisão, estabilidade e capacidade de cortar peças de diferentes espessuras, sendo
                    muito utilizada em marcenarias, oficinas e trabalhos de modelagem.
                </div>
            </div>
        </div>

        <!-- SERRA POLICORTE -->
        <div class="machine-box">
            <img src="https://cdn.dooca.store/5/products/8296_640x640+fill_ffffff.jpg?v=1610728665&webp=0">
            <div class="box-content">
                <div class="box-title">SERRA POLICORTE</div>
                <div class="box-text">
                    Uma serra policorte é uma máquina utilizada para realizar cortes retos e rápidos em metais,
                    utilizando um disco abrasivo ou de vídea. Possui base fixa, braço articulado e sistema de fixação da
                    peça, garantindo estabilidade e segurança durante o corte. É muito usada em metalúrgicas,
                    serralherias e construção civil para cortar tubos, barras e perfis metálicos.
                </div>
            </div>
        </div>

        <!-- ESMERIL DE BANCADA -->
        <div class="machine-box">
            <img
                src="https://cdn.awsli.com.br/600x700/767/767489/produto/239648785/whatsapp-image-2023-11-03-at-11-08-22-b3580d4o39.jpeg">
            <div class="box-content">
                <div class="box-title">ESMERIL DE BANCADA</div>
                <div class="box-text">
                    Um esmeril de bancada é uma máquina estacionária equipada com rebolos abrasivos usada para afiar
                    ferramentas, desbastar materiais, remover rebarbas e dar acabamento em peças metálicas. Fixado à
                    bancada, oferece estabilidade, precisão e segurança nas operações de afiação e retoque, sendo muito
                    utilizado em oficinas mecânicas, serralherias e manutenção geral.
                </div>
            </div>
        </div>

        <!-- SOLDA MULTIPROCESSO -->
        <div class="machine-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXxWTF3Y9j8CdUpUYF6jsLLOdMB1FHzSQ1oA&s">
            <div class="box-content">
                <div class="box-title">SOLDA MULTIPROCESSO</div>
                <div class="box-text">
                    A solda multiprocesso é um equipamento de soldagem capaz de operar em diferentes métodos, como
                    MIG/MAG, TIG e eletrodo revestido. Essa versatilidade permite trabalhar com diversos materiais e
                    espessuras, oferecendo flexibilidade, produtividade e bom acabamento. É amplamente utilizada em
                    manutenção, serralheria, fabricação industrial e projetos profissionais.
                </div>
            </div>
        </div>

        <!-- SOLDA OXIACETILENO -->
        <div class="machine-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqU-WEACqeSj7TkncUmih2zGPTi9tKvXKBOg&s">
            <div class="box-content">
                <div class="box-title">SOLDA OXIACETILENO</div>
                <div class="box-text">
                    A solda oxiacetileno é um processo de soldagem que utiliza a queima controlada de uma mistura de
                    oxigênio e acetileno para gerar uma chama de alta temperatura capaz de fundir metais. É muito usada
                    para soldar, cortar e aquecer peças metálicas, oferecendo boa mobilidade e versatilidade em reparos,
                    manutenção e trabalhos artesanais.
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-voltar-container">
        <a href="{{ route('home') }}#servicos" class="bottom-btn">
            <i class="fa-solid fa-arrow-left"></i> Voltar ao Início
        </a>
    </div>

    @include('layouts.footer')

</body>

</html>
