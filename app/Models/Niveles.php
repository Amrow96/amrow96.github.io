<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    protected $table = 'NIVELES';
    protected $primaryKey = 'id_nivel';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    //Declaramos que la habilidad tiene muchos niveles
    public function habilidades()
    {
        return $this->hasMany('App\Models\Niveles', 'id_nivel');
    }
}
