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
}
