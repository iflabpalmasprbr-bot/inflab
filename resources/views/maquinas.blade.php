@include('layouts.cabecalho')
<!doctype html>
<html lang="pt-BR">

<head>
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

        /* ===== CONTAINER DOS CARDS ===== */
        .machines-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 colunas */
            gap: 30px;
            /* espaço entre os cards */
            max-width: 1200px;
            margin: 0 auto 50px auto;
            padding: 0 15px;
        }

        /* ===== CARD HORIZONTAL ===== */
        .machine-box {
            display: flex;
            flex-direction: column;
            /* imagem em cima e texto abaixo */
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

        /* ===== CAIXA DE TEXTO ===== */
        .box-content {
            padding: 15px 18px 20px 18px;
            flex: 1;
            /* força altura uniforme na linha */
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
            /* ocupa todo o espaço disponível */
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 992px) {
            .machines-container {
                grid-template-columns: repeat(2, 1fr);
                /* 2 colunas */
            }
        }

        @media (max-width: 600px) {
            .machines-container {
                grid-template-columns: 1fr;
                /* 1 coluna */
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
    <h1 class="page-title">MAQUINAS MANUFATURA DIGITAL</h1>
    <p class="page-subtitle">
        </a> Infraestrutura tecnológica do IFPR Palmas para inovação, prototipagem e pesquisa aplicada
    </p>

    <div class="machines-container">
        <div class="machine-box">
            <img src="https://institucional.bold.net/wp-content/uploads/2019/10/router_cnc.jpg">
            <div class="box-content">
                <div class="box-title">ROUTER CNC</div>
                <div class="box-text">
                    Máquina projetada para realizar desbastes a partir da rotação de uma ferramenta (fresa) adequada
                    para
                    cada tipo de material a ser usinado. Possui software próprio para edição das imagens (vetoriais ou
                    BMP)
                    e de controle das características da usinagem, como velocidade de rotação e avanço da fresa e
                    profundidade de corte para cada passada.
                </div>
            </div>
        </div>

        <div class="machine-box">
            <img src="https://m.media-amazon.com/images/I/71Up43l1mQL._AC_UF894,1000_QL80_.jpg">
            <div class="box-content">
                <div class="box-title">GRAVADORA / CORTADORA LASER</div>
                <div class="box-text">
                    Uma gravadora/cortadora a laser é uma máquina que utiliza um feixe de laser de alta precisão para
                    gravar
                    desenhos, textos e padrões em diversos materiais, além de realizar cortes limpos e detalhados. Pode
                    trabalhar com madeira, acrílico, MDF, couro, papel e outros materiais, oferecendo alta qualidade e
                    repetibilidade. É amplamente usada em fabricação digital, artesanato, personalização de produtos e
                    prototipagem.
                </div>
            </div>
        </div>

        <div class="machine-box">
            <img src="https://imagens.3dlab.com.br/wp-content/uploads/2020/06/ender-5-plus-3.png">
            <div class="box-content">
                <div class="box-title">IMPRESSORA 3D</div>
                <div class="box-text">
                    Uma impressora 3D é um equipamento que cria objetos físicos a partir de modelos digitais,
                    depositando
                    material em camadas sucessivas até formar a peça final. Utiliza materiais como plástico, resina ou
                    filamentos especiais, permitindo fabricar protótipos, peças funcionais e modelos personalizados com
                    precisão. É muito utilizada em engenharia, educação, design e fabricação rápida.
                </div>
            </div>
        </div>

        <div class="machine-box">
            <img
                src="https://images.tcdn.com.br/img/img_prod/1109186/plotter_de_impressao_jv1600_plus_i3200_eco_solvente_ou_sublimacao_171_1_252a9c9b82ad848c3f2c4fb583c38af7.jpeg">
            <div class="box-content">
                <div class="box-title">PLOTTER</div>
                <div class="box-text">
                    Um plotter é um equipamento de impressão de grande formato usado para produzir desenhos técnicos,
                    plantas, banners, adesivos e outros materiais em alta resolução. Ele trabalha com rolos de papel ou
                    vinil e permite impressões precisas e de grandes dimensões, sendo amplamente utilizado em gráficas,
                    arquitetura, engenharia e design visual.
                </div>
            </div>
        </div>

        <div class="machine-box">
            <img
                src="https://images.tcdn.com.br/img/img_prod/196157/plotter_de_recorte_e_contorno_v1380c_5785_1_20240903133640.jpg">
            <div class="box-content">
                <div class="box-title">PLOTTER DE CORTE</div>
                <div class="box-text">
                    Um plotter de corte é um equipamento utilizado para recortar com precisão materiais como vinil,
                    adesivos, papel, acetato e tecidos leves. Ele usa uma lâmina controlada eletronicamente para seguir
                    desenhos vetoriais, permitindo criar letras, logotipos, etiquetas e detalhes personalizados. É muito
                    usado em comunicação visual, artesanato, sinalização e personalização de produtos.
                </div>
            </div>
        </div>

        <div class="machine-box">
            <img src="https://http2.mlstatic.com/D_NQ_NP_720341-MLB53398241335_012023-O.webp">
            <div class="box-content">
                <div class="box-title">SCANNER 3D</div>
                <div class="box-text">
                    Um scanner 3D é um dispositivo capaz de capturar a forma e as dimensões de um objeto físico, gerando
                    um
                    modelo digital tridimensional. Ele utiliza luz, laser ou sensores de profundidade para mapear
                    superfícies com precisão. É amplamente usado em engenharia, design, impressão 3D, conservação de
                    peças e
                    inspeções industriais.
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
