<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Cuotas extends Model
{
    protected $table = 'ventasCuotas';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [ 
        'id',
        'idventa',
        'ingreso',
        'tipoDoc',
        'numDoc'
    ];
    protected $guarded = [];
}
