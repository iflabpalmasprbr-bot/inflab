<div class="register-wrapper">
    <div class="register-card">
        <!-- Botão Voltar -->
        <a href="{{ route('home') }}" class="back-btn">← Voltar</a>

        <h2 class="form-title">Criar Conta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div class="form-group">
                <label for="name" class="form-label">Nome</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    autocomplete="name" class="form-input">
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="username" class="form-input">
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Senha -->
            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="form-input">
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar Senha -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" class="form-input">
                @error('password_confirmation')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ações -->
            <div class="form-actions">
                <a href="{{ route('login') }}" class="form-link">Já tem uma conta? Entrar</a>
                <button type="submit" class="form-button">Registrar</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* ====== Layout geral ====== */
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
   Wrapper do Registro
============================== */
    .register-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 20px;
        position: relative;
    }

    /* ==============================
   Card de Registro
============================== */
    .register-card {
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        padding: 40px 35px;
        width: 100%;
        max-width: 420px;
        animation: fadeIn 0.6s ease;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .register-card:hover {
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
   Título do Formulário
============================== */
    .form-title {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    /* ==============================
   Campos do Formulário
============================== */
    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 6px;
        color: #444;
    }

    .form-input {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #d0d7de;
        font-size: 14px;
        transition: border 0.2s ease, box-shadow 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #0078d4;
        box-shadow: 0 0 6px rgba(0, 120, 212, 0.3);
    }

    .form-error {
        color: #ff4d4f;
        font-size: 13px;
        margin-top: 5px;
    }

    /* ==============================
   Ações
============================== */
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
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

    /* Botão Registrar */
    .form-button {
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

    /* ==============================
   Ícones Flutuantes (decorativo)
============================== */
    .floating-icons {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
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
   Animação Fade-in
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
        .register-card {
            padding: 30px 20px;
        }

        .form-title {
            font-size: 20px;
        }

        .form-button {
            width: 100%;
        }

        .floating-icons {
            display: none;
        }
    }
</style>
