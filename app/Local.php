<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    //
    protected $table = 'tbLocal';
    protected $primaryKey = ['CodigoEmpresa','Codigo'];
    public $incrementing = false;
}
    



