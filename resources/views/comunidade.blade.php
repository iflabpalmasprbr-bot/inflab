   @include('layouts.cabecalho')
   <style>
       /* ====================== ESTILO GERAL ====================== */

       .container {
           max-width: 1150px;
           margin: 0 auto;
           padding: 20px;
           font-family: "Inter", Arial, sans-serif;
       }

       /* ====================== CABEÇALHO ====================== */

       .comunidade-header {
           background: linear-gradient(135deg, #003f8c, #007bff);
           color: #fff;
           padding: 80px 25px;
           text-align: center;
           border-radius: 24px;
           margin-bottom: 55px;
           box-shadow: 0 8px 28px rgba(0, 0, 0, 0.32);
           animation: fadeIn 0.8s ease;
       }

       .comunidade-header h1 {
           font-size: 50px;
           font-weight: 800;
           margin-bottom: 12px;
           letter-spacing: -1px;
       }

       .comunidade-header p {
           font-size: 20px;
           opacity: 0.93;
           max-width: 700px;
           margin: 0 auto;
       }

       /* ======================================
   CARDS DAS SEÇÕES
====================================== */

       .content-section {
           background: #ffffff;
           padding: 40px 35px;
           border-radius: 20px;
           margin-bottom: 40px;
           box-shadow: 0 6px 22px rgba(0, 0, 0, 0.12);
           transition: 0.3s ease;
           opacity: 0;
           animation: slideUp 0.6s ease forwards;
       }

       .content-section:nth-child(2) {
           animation-delay: 0.3s;
       }

       .content-section:nth-child(3) {
           animation-delay: 0.45s;
       }

       .content-section:nth-child(4) {
           animation-delay: 0.6s;
       }

       .content-section:hover {
           transform: translateY(-6px);
           box-shadow: 0 12px 30px rgba(0, 0, 0, 0.16);
       }

       .content-section h2 {
           font-size: 32px;
           color: #003f8c;
           font-weight: 800;
           margin-bottom: 20px;
           position: relative;
       }

       .content-section h2::after {
           content: "";
           width: 60px;
           height: 4px;
           background: #007bff;
           border-radius: 4px;
           position: absolute;
           bottom: -6px;
           left: 0;
       }

       .content-section p {
           font-size: 17px;
           line-height: 1.6;
           margin-bottom: 18px;
       }

       /* LISTAS */
       .content-section ul {
           padding-left: 22px;
       }

       .content-section ul li {
           margin-bottom: 10px;
           font-size: 16.5px;
           color: #444;
       }

       /* ====================== CARD DE CONTATO ====================== */

       .contact-box {
           background: #e8f0ff;
           border-left: 6px solid #007bff;
           padding: 22px 26px;
           border-radius: 14px;
           margin-top: 25px;
           box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
       }

       .contact-box strong {
           color: #003f8c;
           font-size: 17px;
       }

       /* ====================== ANIMAÇÕES ====================== */

       @keyframes fadeIn {
           from {
               opacity: 0;
               transform: translateY(-20px);
           }

           to {
               opacity: 1;
               transform: translateY(0);
           }
       }

       @keyframes slideUp {
           from {
               opacity: 0;
               transform: translateY(30px);
           }

           to {
               opacity: 1;
               transform: translateY(0);
           }
       }

       /* ====================== RESPONSIVIDADE ====================== */

       @media (max-width: 768px) {

           .comunidade-header {
               padding: 50px 20px;
               border-radius: 18px;
           }

           .comunidade-header h1 {
               font-size: 32px;
           }

           .comunidade-header p {
               font-size: 15px;
           }

           .content-section {
               padding: 25px;
           }

           .content-section h2 {
               font-size: 24px;
           }

           .content-section h2::after {
               width: 40px;
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
   <div class="container">
       <div class="comunidade-header">
           <h1>Atendimento à Comunidade</h1>
           <p>Suporte especializado para projetos acadêmicos, sociais e profissionais.</p>
       </div>
       <p class="page-subtitle"> Voltar
           </a> Infraestrutura tecnológica do IFPR Palmas para inovação, prototipagem e pesquisa aplicada
       </p>
       <div class="content-section">
           <h2>Projetos Acadêmicos</h2>
           <p>Oferecemos suporte completo para estudantes e instituições educacionais.</p>
           <ul>
               <li>Auxílio técnico em projetos escolares</li>
               <li>Construção de protótipos</li>
               <li>Treinamentos e workshops</li>
               <li>Apoio no desenvolvimento científico</li>
           </ul>
       </div>

       <div class="content-section">
           <h2>Parcerias Profissionais</h2>
           <p>Trabalhamos juntamente com empresas, organizações e profissionais liberais.</p>
           <ul>
               <li>Desenvolvimento de soluções práticas</li>
               <li>Criação de dispositivos personalizados</li>
               <li>Atendimento especializado para projetos técnicos</li>
               <li>Consultorias e orientação técnica</li>
           </ul>

           <div class="contact-box">
               <strong>Entre em contato:</strong><br>
               E-mail: manweb2024@gmail.com<br>
               Telefone/WhatsApp: (XX) XXXX-XXXX
           </div>
       </div>

       <div class="content-section">
           <h2>Extensão e Pesquisa</h2>
           <p>Nosso espaço apoia iniciativas comunitárias que promovem tecnologia, inovação e educação.</p>
           <ul>
               <li>Projetos de impacto social</li>
               <li>Laboratórios abertos à comunidade</li>
               <li>Apoio para eventos educacionais</li>
               <li>Incentivo à inclusão tecnológica</li>
           </ul>
       </div>
       <div class="bottom-voltar-container">
           <a href="{{ route('home') }}#servicos" class="bottom-btn">
               <i class="fa-solid fa-arrow-left"></i> Voltar ao Início
           </a>
       </div>

   </div>
   @include('layouts.footer')
