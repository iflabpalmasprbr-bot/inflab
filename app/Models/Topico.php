<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    protected $fillable = ['titulo', 'descricao', 'autor','categoria'];

    // Um tópico tem muitas conversas
    public function conversas()
    {
        return $this->hasMany(Conversa::class);
    }
    
}
 