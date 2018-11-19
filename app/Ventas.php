<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'id',
        'fechaVenta',
        'tipoDoc',
        'numDoc',
        'docHistorial',
        'cliente',
        'idproducto',
        'costoVenta',
        'saldo',
        'ingreso',
        'estado'
    ];
    protected $guarded = [];
}
