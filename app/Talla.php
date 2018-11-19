<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = 'tallas';
    protected $primaryKey = 'idtalla';
    public $timestamps=false;
    protected $fillable = [ 
        'idtalla',
        'nombre', 
        'estado'
    ];
    protected $guarded = [];
}
