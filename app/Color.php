<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';
    protected $primaryKey = 'idcolor';
    public $timestamps=false;
    protected $fillable = [ 
        'idcolor',
        'nombre',
        'estado'
    ];
    protected $guarded = []; 
}
