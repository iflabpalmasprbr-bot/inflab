<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ForumController;
use App\Models\Evento;


// =======================================
// HOME
// =======================================
Route::get('/', function () {
    $eventos = Evento::orderBy('data_evento', 'asc')->get();
    return view('home', compact('eventos'));
})->name('home');


// =======================================
// EVENTOS
// =======================================
Route::prefix('eventos')->group(function () {
    Route::get('/', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/create', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/{id}', [EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');
    Route::get('/{id}', [EventoController::class, 'show'])->name('eventos.show');
});


// =======================================
// AUTENTICAÇÃO
// =======================================
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


// =======================================
// CHAT
// =======================================


// =======================================
// AGENDAMENTOS
// =======================================
Route::middleware('auth')->group(function () {
    Route::get('/agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');
    Route::post('/agendamento/salvar', [AgendamentoController::class, 'store'])->name('agendamento.store');
    Route::post('/agendamento/excluir', [AgendamentoController::class, 'excluir'])->name('agendamento.excluir');
    Route::post('/agendamento/aceitar', [AgendamentoController::class, 'aceitar'])->name('agendamento.aceitar');
    Route::post('/agendamento/recusar', [AgendamentoController::class, 'recusar'])->name('agendamento.recusar');
});


// =======================================
// PÁGINAS SIMPLES
// =======================================
Route::view('/maquinas', 'maquinas')->name('maquinas');
Route::view('/visitas', 'visitas')->name('visitas');
Route::view('/workshop', 'workshop')->name('workshop');
Route::view('/treinamentos', 'treinamentos')->name('treinamentos');
Route::view('/eletronica', 'eletronica')->name('eletronica');
Route::view('/robotica', 'robotica')->name('robotica');
Route::view('/marcenaria', 'marcenaria')->name('marcenaria');
Route::view('/usinagem', 'usinagem')->name('usinagem');
Route::view('/comunidade', 'comunidade')->name('comunidade');

Route::get('/bem-vindo', function () {
    return view('bem');
})->middleware('auth')->name('bem');


// =======================================
// FÓRUM
// =======================================
Route::middleware('auth')->prefix('forum')->group(function () {

    Route::get('/', [ForumController::class, 'index'])->name('forum.index');
    Route::post('/', [ForumController::class, 'store'])->name('forum.store');

    Route::get('/{id}', [ForumController::class, 'show'])->name('forum.show');
    Route::post('/{id}/responder', [ForumController::class, 'responder'])->name('forum.responder');

    Route::delete('/destroy-multiple', [ForumController::class, 'destroyMultiple'])
        ->name('forum.destroyMultiple');
});
//
Route::get('/agenda/semana', [AgendamentoController::class, 'agenda_semana'])
    ->name('agenda.semana');
Route::post('/comentario-update', [AgendamentoController::class, 'update_comentario'])
    ->name('update.comentario');
