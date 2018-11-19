<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'idmovimiento';
    public $timestamps=false;
    protected $fillable = [ 
        'idmovimiento',
        'idproducto',
        'idSucOrigen',
        'idSucDestino',
        'fecha'
    ];
    protected $guarded = [];
}
