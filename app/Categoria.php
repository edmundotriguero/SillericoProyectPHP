<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'idcategoria';
    public $timestamps=false;
    protected $fillable = [ 
        'idcategoria',
        'nombre',
        'condicion'
    ];
    protected $guarded = [];
}
