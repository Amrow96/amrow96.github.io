<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    protected $table = 'HABILIDADES';
    protected $primaryKey = 'id_habilidad';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    //Declaramos que la habilidad tiene muchos niveles
    public function niveles()
    {
        return $this->belongsTo('App\Models\Niveles', 'id_nivel');
    }
}
