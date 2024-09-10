<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'id',
        'user_id',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getDescricaoFormatadoAttribute ()
    {
        return substr($this->descricao,0,10);
    }
    

}
