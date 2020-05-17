<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
        use Notifiable;


    protected $table = 'users';
    protected $primaryKey ='idUsers';
    public $incrementing = true;
    public $timestamps = false;
    
}