<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversa extends Model
{
    protected $table = 'conversas'; // nome da tabela no banco
    protected $fillable = ['topico_id', 'autor', 'conteudo'];

    // Cada conversa pertence a um tópico
    public function topico()
    {
        return $this->belongsTo(Topico::class);
    }
}
