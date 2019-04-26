<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lote';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [ 
        'id',
        'nombre',
        'porcentaje_descuento'
        
    ];
    protected $guarded = [];
}
