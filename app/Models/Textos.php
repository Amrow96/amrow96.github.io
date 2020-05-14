<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Textos extends Model
{
    protected $table = 'textos';
    public $primaryKey = 'idtxt';
    public $incrementing= true;
    public $timestamps = false;
}
