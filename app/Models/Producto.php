<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'almacen_id',
    ];

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }
}