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
}
