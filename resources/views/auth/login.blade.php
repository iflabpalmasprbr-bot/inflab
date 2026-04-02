<div class="login-wrapper">
    <div class="login-card">

        <!-- Botão Voltar -->
        <a href="{{ route('home') }}" class="back-btn">← Voltar</a>

        <h2 class="login-title">Acesso ao Sistema</h2>

        <!-- Mensagem de status -->
        @if (session('status'))
            <p class="login-status">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="username" class="form-input">
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Senha -->
            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="form-input">
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lembrar -->
            <div class="form-remember">
                <label for="remember_me" class="remember-label">
                    <input id="remember_me" type="checkbox" name="remember" class="remember-checkbox">
                    <span class="remember-text">Lembrar-me</span>
                </label>
            </div>

            <!-- Ações -->
            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="form-link">Esqueceu sua senha?</a>
                @endif
                <button type="submit" class="form-button"><i class="fas fa-sign-in-alt"></i> Entrar</button>
            </div>
        </form>

        <div class="form-footer">
            <p>Não tem conta?
                <a href="{{ route('register') }}" class="form-register-link">Registre-se</a>
            </p>
        </div>
    </div>

    <!-- Ícones flutuantes de física -->
    <div class="floating-icons">
        <i class="fas fa-atom icon-physics"></i>
        <i class="fas fa-cogs icon-physics"></i>
        <i class="fas fa-flask icon-physics"></i>
        <i class="fas fa-lightbulb icon-physics"></i>
    </div>
</div>

<style>
    /* ==============================
   Estilo Global
============================== */
    body {
        background: linear-gradient(135deg, #cce7ff 0%, #e6f3ff 100%);
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        overflow: hidden;
    }

    /* ==============================
   Wrapper do Login
============================== */
    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 20px;
        position: relative;
    }

    /* ==============================
   Card de Login
============================== */
    .login-card {
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        padding: 40px 35px;
        width: 100%;
        max-width: 400px;
        position: relative;
        animation: fadeIn 0.6s ease;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    /* ==============================
   Botão Voltar
============================== */
    .back-btn {
        display: inline-block;
        margin-bottom: 20px;
        padding: 6px 14px;
        font-size: 14px;
        color: #0078d4;
        background-color: #f0f8ff;
        border: 1px solid #d0d7de;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .back-btn:hover {
        background-color: #e1f0ff;
        color: #004a8f;
        transform: translateY(-1px);
    }

    /* ==============================
   Títulos e Mensagens
============================== */
    .login-title {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        font-weight: 600;
    }

    .login-status {
        text-align: center;
        margin-bottom: 15px;
        color: #ff4d4f;
    }

    /* ==============================
   Formulário
============================== */
    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
    }

    .form-input {
        width: 100%;
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid #d0d7de;
        font-size: 14px;
        transition: border 0.2s ease, box-shadow 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #0078d4;
        box-shadow: 0 0 5px rgba(0, 120, 212, 0.3);
    }

    .form-error {
        margin-top: 5px;
        color: #ff4d4f;
        font-size: 13px;
    }

    /* ==============================
   Checkbox Lembrar
============================== */
    .form-remember {
        margin-bottom: 20px;
    }

    .remember-label {
        display: flex;
        align-items: center;
        font-size: 14px;
    }

    .remember-checkbox {
        margin-right: 8px;
    }

    /* ==============================
   Botões e Links do Formulário
============================== */
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-link {
        font-size: 14px;
        color: #0078d4;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .form-link:hover {
        color: #004a8f;
    }

    .form-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #0078d4, #0056a3);
        color: #fff;
        padding: 12px 25px;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 120, 212, 0.4);
    }

    .form-button:hover {
        background: linear-gradient(135deg, #0056a3, #003d7a);
        box-shadow: 0 10px 25px rgba(0, 86, 163, 0.5);
    }

    .form-button i {
        font-size: 16px;
        transition: transform 0.3s ease;
    }

    .form-button:hover i {
        transform: translateX(4px);
    }

    /* ==============================
   Rodapé do Formulário
============================== */
    .form-footer {
        text-align: center;
        font-size: 14px;
    }

    .form-register-link {
        color: #0078d4;
        text-decoration: none;
        font-weight: 500;
    }

    .form-register-link:hover {
        color: #004a8f;
    }

    /* ==============================
   Ícones Flutuantes de Física
============================== */
    .floating-icons {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: visible;
    }

    .icon-physics {
        position: absolute;
        font-size: 24px;
        color: #0056a3;
        animation: float 6s ease-in-out infinite;
    }

    .icon-physics:nth-child(1) {
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .icon-physics:nth-child(2) {
        top: 30%;
        right: 10%;
        animation-delay: 2s;
    }

    .icon-physics:nth-child(3) {
        bottom: 20%;
        left: 15%;
        animation-delay: 4s;
    }

    .icon-physics:nth-child(4) {
        bottom: 10%;
        right: 5%;
        animation-delay: 6s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    /* ==============================
   Animação de Fade-in do Card
============================== */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ==============================
   Responsividade
============================== */
    @media (max-width: 480px) {
        .login-card {
            padding: 30px 20px;
        }

        .login-title {
            font-size: 20px;
        }

        .form-button {
            width: 100%;
            justify-content: center;
        }

        /* Ocultar ícones flutuantes em telas pequenas */
        .floating-icons {
            display: none;
        }
    }
</style>

<!-- Lembre-se de ter o Font Awesome incluído no projeto para os ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
