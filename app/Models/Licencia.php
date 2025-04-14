<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    protected $table = 'Licencias';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Nombre', 'Fecha', 'DiasInc', 'Diagnostico', 'Municipio', 'Nivel', 'Serie'
    ];
}
