<?php
/*
|--------------------------------------------------------------------------
| Comando Artisan Personalizado
|--------------------------------------------------------------------------
|
| Este arquivo define um comando personalizado do Artisan.
|
| O comando "inspire" pode ser executado no terminal com:
|     php artisan inspire
|
| Quando executado, ele exibe uma frase inspiradora utilizando
| a classe Illuminate\Foundation\Inspiring.
|
| Explicação:
| - Artisan::command() cria um comando customizado.
| - 'inspire' é o nome do comando.
| - $this->comment() exibe o texto formatado no console.
| - Inspiring::quote() retorna uma frase inspiradora aleatória.
| - ->purpose() define a descrição do comando, exibida ao rodar
|   "php artisan list".
|
| Esse é um exemplo padrão que vem no Laravel para demonstrar
| como criar comandos personalizados.
|
*/

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
