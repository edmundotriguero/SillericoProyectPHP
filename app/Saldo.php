<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'ventasaldo';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [ 
        'id',
        'idventa',
        'ingreso',
        'fecha',
        'tipoDoc',
        'numDoc',
        'estado'
    ];
}
