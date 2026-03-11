
    <div class="form-container">
        <p class="form-instruction">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-input">
                
                @if ($errors->has('password'))
                    <p class="form-error">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="form-actions">
                <button type="submit" class="form-button">{{ __('Confirm') }}</button>
            </div>
        </form>
    </div>

    <style>
        /* Container geral do formulário */
        .form-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 25px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        /* Texto de instrução */
        .form-instruction {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Cada campo do formulário */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }

        /* Mensagens de erro */
        .form-error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        /* Botão */
        .form-actions {
            text-align: right;
        }

        .form-button {
            background-color: #007bff;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.2s;
        }

        .form-button:hover {
            background-color: #0056b3;
        }
    </style>

