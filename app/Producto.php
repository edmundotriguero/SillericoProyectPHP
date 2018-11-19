<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idproducto';
    public $timestamps=false;
    protected $fillable = [
        'idcategoria',
        'fechaCod',
        'codigo',
        'idtalla',
        'idtela',
        'precio',
        'idcolor',
        'idcategoria',
        'idsucursal',
        'estado',
        'descripcion'
    ];
    protected $guarded = [];
}
