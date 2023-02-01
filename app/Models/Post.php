<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'tags'
    ];

    //Caso o carregamento entre duas classes for algo padrão, 
    //coloque nessa variável
    protected $with = ['user'];

    //Função para mostrar que o Post pertence a alguém da classe User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
