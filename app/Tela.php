<?php

namespace sillericos;

use Illuminate\Database\Eloquent\Model;

class Tela extends Model
{
    protected $table = 'telas';
    protected $primaryKey = 'idtela';
    public $timestamps=false;
    protected $fillable = [
        'idtela',
        'nombre',
        'descripcion',
        'condicion'
    ];
    protected $guarded = [];
}

