<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicina extends Model {
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'principio_activo',
        'concentracion',
        'laboratorio',
        'stock',
        'precio',
        'fecha_vencimiento',
        'categoria',
        'estado'
    ];
}
