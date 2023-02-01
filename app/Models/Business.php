<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    //  Essa variável $fillable serve para permitir atualizações em 
    //massa, caso o campo não seja colocado na variável, ela é bloqueada
    //por padrão
    protected $fillable = [
        'name',
        'email',
        'address',
        'logo'
    ];
}
