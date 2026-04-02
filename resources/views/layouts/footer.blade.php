<!-- FOOTER IFPR PROFISSIONAL -->
<footer id="footer-iflab">
    <div class="container">
        <div class="footer-content">

            <!-- Sobre o IFLAB -->
            <div class="footer-about">
                <div class="footer-logo">
                    <h3>IFPR Campus Palmas</h3>
                </div>

                <p>
                    O IFLAB é um laboratório de fabricação digital e prototipagem do Instituto Federal do Paraná,
                    Campus Palmas, dedicado a apoiar projetos de inovação e tecnologia.
                </p>

                <div class="social-links">
                    <a href="https://www.youtube.com/@ifprpalmas" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Links Rápidos -->
            <div class="footer-links">
                <h4>Links Rápidos</h4>
                <ul>
                    <li><a href="/#sobre">Sobre o IFLAB</a></li>
                    <li><a href="/#servicos">Serviços</a></li>
                    <li><a href="/#eventos">Eventos</a></li>
                    <li><a href="/#agendamento">Agendamento</a></li>
                    <li><a href="/#contato">Contato</a></li>

                </ul>
            </div>

            <!-- Institucional -->
            <div class="footer-links">
                <h4>Institucional</h4>
                <ul>
                    <li><a href="https://palmas.ifpr.edu.br" target="_blank">IFPR Campus Palmas</a></li>
                    <li><a href="https://www.ifpr.edu.br/palmas/biblioteca/" target="_blank">Biblioteca</a></li>
                    <li><a href="https://www.ifpr.edu.br/editais/" target="_blank">Editais</a></li>
                    <li><a href="https://www.ifpr.edu.br/eventos/" target="_blank">Eventos Institucionais</a></li>
                    <li><a href="https://www.ifpr.edu.br/ouvidoria/" target="_blank">Ouvidoria</a></li>
                </ul>
            </div>

        </div>

        <div class="copyright">
            <p>&copy; 2025 IFPR Campus Palmas - IFLAB. Todos os direitos reservados.</p>
        </div>
    </div>

    <!-- ESTILOS DO FOOTER -->
    <style>
        :root {
            --ifpr-blue: #004080;
            --ifpr-light-blue: #3171b4;
            --ifpr-green: #2f9e41;
        }

        #footer-iflab {
            background: var(--ifpr-blue);
            color: #fff;
            font-family: "Arial", sans-serif;
            padding: 60px 20px 30px;
            animation: fadeInFooter 1s ease-in-out;
        }

        @keyframes fadeInFooter {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #footer-iflab .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        #footer-iflab .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        #footer-iflab .footer-logo h3 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        #footer-iflab p {
            line-height: 1.6;
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        #footer-iflab .footer-links h4 {
            margin-bottom: 20px;
            font-size: 1.2rem;
            position: relative;
            padding-bottom: 10px;
        }

        #footer-iflab .footer-links h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--ifpr-light-blue);
        }

        #footer-iflab .footer-links ul {
            list-style: none;
            padding: 0;
        }

        #footer-iflab .footer-links ul li {
            margin-bottom: 10px;
        }

        #footer-iflab .footer-links ul li a {
            color: #cfd8dc;
            text-decoration: none;
            transition: 0.3s;
        }

        #footer-iflab .footer-links ul li a:hover {
            color: white;
        }

        #footer-iflab .social-links {
            display: flex;
            gap: 15px;
        }

        #footer-iflab .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            font-size: 18px;
            transition: all 0.3s;
        }

        #footer-iflab .social-links a:hover {
            background: var(--ifpr-light-blue);
            transform: translateY(-3px);
        }

        #footer-iflab .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 0.9rem;
            color: #ccc;
        }

        @media (max-width: 992px) {
            #footer-iflab .footer-content {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            #footer-iflab .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            #footer-iflab .footer-logo {
                justify-content: center;
            }

            #footer-iflab .social-links {
                justify-content: center;
            }

            #footer-iflab .footer-links h4::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }
    </style>
</footer>
