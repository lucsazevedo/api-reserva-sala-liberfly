<?php

namespace App;

//use Illuminate\Auth\Authenticatable;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Lumen\Auth\Authorizable;

class Agendamento extends Model
{
    public $timestamps = false;
    protected $table = 'agendamentos';
    protected $fillable = [
        'id_sala',
        'email',
        'dt_inicio',
        'dt_fim',
        'descricao',
        'inativo'
    ];
}
