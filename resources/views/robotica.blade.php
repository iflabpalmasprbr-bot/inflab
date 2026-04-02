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
            /* altura uniforme */
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

    <h1 class="page-title">Robótica</h1>
    <p class="page-subtitle">Infraestrutura tecnológica do IFPR Palmas para inovação, prototipagem e pesquisa
        aplicada.
    </p>

    <div class="machines-container">
        <!-- ROBÔ SEGUIDOR DE LINHA -->
        <div class="machine-box">
            <img src="https://blog.eletrogate.com/wp-content/uploads/2020/07/Sem-Titulo-1-Recuperado.jpg">
            <div class="box-content">
                <div class="box-title">ROBÔ SEGUIDOR DE LINHA</div>
                <div class="box-text">
                    Um robô seguidor de linha é um dispositivo automatizado projetado para detectar e seguir um trajeto
                    marcado no chão, geralmente uma linha preta ou branca. Ele utiliza sensores ópticos para identificar
                    o caminho e ajustar seus movimentos, mantendo-se sobre a rota. É muito usado em atividades
                    educacionais, competições de robótica e estudos de lógica de controle.
                </div>
            </div>
        </div>

        <!-- SENSORES PARA MICROCONTROLADORES -->
        <div class="machine-box">
            <img src="https://embarcacoes.ic.unicamp.br/imgs/posts/microcontroladores/microcontroladores.jpg">
            <div class="box-content">
                <div class="box-title">SENSORES PARA MICROCONTROLADORES</div>
                <div class="box-text">
                    Sensores para microcontroladores são dispositivos que detectam variáveis físicas — como temperatura,
                    luz, umidade, distância, movimento ou pressão — e convertem essas informações em sinais elétricos
                    compreensíveis pelo microcontrolador. Eles permitem que sistemas eletrônicos percebam o ambiente e
                    tomem decisões automatizadas, sendo amplamente utilizados em projetos educacionais, automação,
                    robótica e Internet das Coisas (IoT).
                </div>
            </div>
        </div>

        <!-- MICROCONTROLADORES -->
        <div class="machine-box">
            <img src="https://edu.ieee.org/br-ufcgras/wp-content/uploads/sites/243/arduino-1128227_1280.jpg">
            <div class="box-content">
                <div class="box-title">MICROCONTROLADORES</div>
                <div class="box-text">
                    Microcontroladores são pequenos computadores integrados em um único chip, contendo processador,
                    memória e periféricos. Eles são projetados para controlar dispositivos eletrônicos de forma
                    automática, executando tarefas específicas em sistemas embarcados. Muito utilizados em automação,
                    robótica, eletrodomésticos, IoT e projetos educacionais, permitem criar soluções inteligentes e de
                    baixo consumo de energia.
                </div>
            </div>
        </div>

        <!-- ROBÔ DE SUMÔ -->
        <div class="machine-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6gOpw5vE-hIhtYoNz9Il7Ti2OnykgUOLDew&s">
            <div class="box-content">
                <div class="box-title">ROBÔ DE SUMÔ</div>
                <div class="box-text">
                    Um robô de sumô é um robô autônomo projetado para competir em arenas circulares, onde o objetivo é
                    empurrar o oponente para fora do ringue. Ele utiliza sensores para detectar bordas e localizar o
                    adversário, além de motores potentes e estrutura reforçada para garantir força e estabilidade. É
                    muito usado em competições de robótica, desenvolvendo habilidades de estratégia, eletrônica e
                    programação.
                </div>
            </div>
        </div>

        <!-- DRONE -->
        <div class="machine-box">
            <img src="https://loja.superimportadora.com.br/wp-content/uploads/2023/08/drone-dji-agras-t25.jpg">
            <div class="box-content">
                <div class="box-title">DRONE</div>
                <div class="box-text">
                    Um drone é um veículo aéreo não tripulado, controlado remotamente ou de forma autônoma, capaz de
                    realizar voos estáveis por meio de múltiplos rotores. Ele é utilizado para captação de imagens,
                    inspeções, mapeamentos, lazer e diversas aplicações profissionais. Sua estrutura leve, sensores
                    integrados e sistemas de controle permitem manobrabilidade, precisão e segurança durante o voo.
                </div>
            </div>
        </div>

        <!-- SOFTWARES PARA EDIÇÃO E CONTROLE -->
        <div class="machine-box">
            <img src="https://blog.avell.com.br/wp-content/uploads/2025/05/Adobe-Premiere-Pro-1024x573.png">
            <div class="box-content">
                <div class="box-title">SOFTWARES PARA EDIÇÃO E CONTROLE</div>
                <div class="box-text">
                    Softwares para edição e controle são programas utilizados para criar, modificar, organizar e
                    gerenciar diferentes tipos de conteúdo ou processos. Eles podem incluir ferramentas de edição de
                    texto, imagem, áudio e vídeo, além de sistemas para controle de produção, automação, projetos ou
                    dispositivos. Esses softwares facilitam o trabalho, aumentam a precisão e permitem maior eficiência
                    em diversas áreas profissionais e educacionais.
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
