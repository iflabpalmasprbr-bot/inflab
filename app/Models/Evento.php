<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    // Se a tabela tiver nome padrão 'eventos', isso não é obrigatório,
    // mas podemos deixar explícito
    protected $table = 'eventos';

    // Campos que podem ser preenchidos em massa (mass assignable)
    protected $fillable = [
        'titulo',
        'descricao',
        'data_evento',
        'hora_evento',
        'local',
        'status',
        'imagem',
        'categoria'

    ];

    // Se quiser, pode definir que timestamps são automáticos
    public $timestamps = true;
}
