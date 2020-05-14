<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $table = 'imatges';
    public $primaryKey = 'idimatges';
    public $incrementing= true;
    public $timestamps = false;
}
