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

        /* ===== GRID DE CARDS ===== */
        .machines-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 colunas */
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
            /* faz altura uniforme */
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
                /* 2 colunas em tablets */
            }
        }

        @media (max-width: 600px) {
            .machines-container {
                grid-template-columns: 1fr;
                /* 1 coluna em celulares */
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

    <h1 class="page-title">Marcenaria</h1>
    <p class="page-subtitle"> Voltar
        </a> Infraestrutura tecnológica do IFPR Palmas para inovação, prototipagem e pesquisa aplicada
    </p>

    <div class="machines-container">
        <!-- ROUTER CNC -->
        <div class="machine-box">
            <img
                src="https://www.raizenmachine.com.br/blog/assets/images/noticias/router-cnc-para-comunicacao-visual.webp">
            <div class="box-content">
                <div class="box-title">ROUTER CNC</div>
                <div class="box-text">
                    Máquina projetada para realizar desbastes a partir da rotação de uma ferramenta (fresa) adequada
                    para cada tipo de material a ser usinado. Possui software próprio para edição das imagens (vetoriais
                    ou BMP) e para controle das características da usinagem, como velocidade de rotação, avanço da fresa
                    e profundidade de corte.
                </div>
            </div>
        </div>

        <!-- TORNO COPIADOR -->
        <div class="machine-box">
            <img src="https://http2.mlstatic.com/D_NQ_NP_820289-MLU73557569745_122023-O.webp">
            <div class="box-content">
                <div class="box-title">TORNO COPIADOR</div>
                <div class="box-text">
                    Um torno copiador é uma máquina utilizada para usinagem que permite reproduzir peças com o mesmo
                    formato a partir de um modelo ou gabarito. Ele funciona seguindo o perfil de uma peça padrão,
                    copiando suas formas e dimensões para outra peça bruta. É muito usado para produzir objetos
                    cilíndricos ou com contornos complexos, garantindo repetibilidade, precisão e alta produtividade na
                    fabricação de peças em série.
                </div>
            </div>
        </div>

        <!-- SERRA CIRCULAR DE BANCADA -->
        <div class="machine-box">
            <img
                src="https://voceconstroi.fbitsstatic.net/img/p/serra-circular-bancada-gts-254-bosch-127v-1800w-71658/258355.jpg?w=1000&h=1000&v=202502191855">
            <div class="box-content">
                <div class="box-title">SERRA CIRCULAR DE BANCADA</div>
                <div class="box-text">
                    Uma serra circular de bancada é uma máquina estacionária utilizada para cortes retos e precisos em
                    madeira, MDF, compensados e outros materiais semelhantes. Possui uma lâmina circular acionada por
                    motor fixada em uma mesa plana, permitindo estabilidade e produtividade nos cortes. É amplamente
                    usada em marcenarias e oficinas para cortes longitudinais, transversais e ajustes de peças com
                    rapidez e segurança.
                </div>
            </div>
        </div>

        <!-- SERRA ESQUADRIA -->
        <div class="machine-box">
            <img
                src="https://ferramentasgerais.vteximg.com.br/arquivos/ids/968697/Serra-de-esquadria-71-4-850W-127V~-SED-857---DWT---6005857127---DWT.jpg?v=638918795923330000">
            <div class="box-content">
                <div class="box-title">SERRA ESQUADRIA</div>
                <div class="box-text">
                    Uma serra esquadria é uma ferramenta utilizada para realizar cortes precisos em ângulos variados,
                    especialmente em madeira, MDF e perfis. Possui uma lâmina circular montada em um braço articulado
                    que permite ajustar o ângulo do corte, sendo ideal para molduras, rodapés, batentes e encaixes. É
                    muito usada em marcenaria, carpintaria e acabamentos devido à sua precisão e praticidade.
                </div>
            </div>
        </div>

        <!-- SERRA TICO-TICO -->
        <div class="machine-box">
            <img
                src="https://apotiguar.fbitsstatic.net/img/p/serra-tico-tico-450w-220v-makita-97594/283424-4.jpg?w=800&h=800&v=no-change&qs=ignore">
            <div class="box-content">
                <div class="box-title">SERRA TICO-TICO</div>
                <div class="box-text">
                    Uma serra tico-tico é uma ferramenta elétrica portátil utilizada para realizar cortes curvos, retos
                    e detalhados em madeira, MDF, plástico e outros materiais. Ela usa uma lâmina estreita que se move
                    rapidamente para cima e para baixo, permitindo cortes precisos, acabamentos delicados e formas
                    complexas. É muito versátil e comum em marcenarias, artesanato e trabalhos de bricolagem.
                </div>
            </div>
        </div>

        <!-- LIXADEIRA DE BANCADA -->
        <div class="machine-box">
            <img
                src="https://www.agrotama.com.br/upload/novo_produtos/lixadeiradecinta4x36disco150mm6350w_102036852.jpg">
            <div class="box-content">
                <div class="box-title">LIXADEIRA DE BANCADA</div>
                <div class="box-text">
                    Uma lixadeira de bancada é uma máquina estacionária usada para desbaste, nivelamento e acabamento de
                    peças em madeira, metal ou plástico. Possui uma lixa instalada em disco ou em cinta, acionada por
                    motor fixo na bancada, oferecendo estabilidade e precisão no lixamento. É ideal para modelar bordas,
                    ajustar medidas e realizar acabamentos uniformes em oficinas e marcenarias.
                </div>
            </div>
        </div>

        <!-- FURADEIRA ELÉTRICA -->
        <div class="machine-box">
            <img
                src="https://antferramentas.vtexassets.com/arquivos/ids/170698-800-auto?v=637314588724770000&width=800&height=auto&aspect=true">
            <div class="box-content">
                <div class="box-title">FURADEIRA ELÉTRICA</div>
                <div class="box-text">
                    Uma furadeira elétrica é uma ferramenta portátil usada para perfurar madeira, metal, plástico e
                    outros materiais. Ela utiliza um motor que gira brocas de diferentes tamanhos, permitindo furos
                    precisos e rápidos. Versátil e prática, é amplamente utilizada em oficinas, construções e serviços
                    domésticos para montagem, instalações e reparos.
                </div>
            </div>
        </div>

        <!-- SERRA CIRCULAR MANUAL -->
        <div class="machine-box">
            <img
                src="https://images.tcdn.com.br/img/img_prod/469103/serra_circular_manual_9_1_4_5902b_2000w_220v_1169351_1_20160607141002_20160719110356.jpg">
            <div class="box-content">
                <div class="box-title">SERRA CIRCULAR MANUAL</div>
                <div class="box-text">
                    Uma serra circular manual é uma ferramenta portátil utilizada para realizar cortes retos e rápidos
                    em madeira, MDF, compensados e outros materiais. Equipada com uma lâmina circular de alta rotação,
                    permite cortes longitudinais e transversais com boa precisão. É amplamente usada em construção
                    civil, marcenaria e serviços de manutenção pela sua praticidade e mobilidade.
                </div>
            </div>
        </div>

        <!-- DESENGROSSADEIRA MANUAL -->
        <div class="machine-box">
            <img src="https://m.media-amazon.com/images/I/61wvUv-xn2L._AC_UF894,1000_QL80_.jpg">
            <div class="box-content">
                <div class="box-title">DESENGROSSADEIRA MANUAL</div>
                <div class="box-text">
                    Uma desengrossadeira manual é uma ferramenta utilizada para desbastar, reduzir a espessura e nivelar
                    superfícies de madeira de forma controlada. Funciona por meio de lâminas ajustáveis que retiram
                    pequenas camadas do material, permitindo obter peças com espessura uniforme e acabamento mais liso.
                    É indicada para carpintaria, marcenaria e ajustes finos em trabalhos manuais com madeira.
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
