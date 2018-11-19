<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    protected $primaryKey = 'idsucursales';
    public $timestamps=false;
    protected $fillable = [ 
        'idsucursales',
        'nombre',
        'direccion',
        'condicion'
    ];
    protected $guarded = [];
}
