<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    // Nome da tabela
    protected $table = 'agendamentos';

    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'categoria',
        'servico',
        'data_desejada',
        'horario_desejado',
        'descricao_projeto',
        'comentario',
        'status',
    ];
}
