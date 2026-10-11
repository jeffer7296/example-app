<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacenes';

    protected $fillable = ['nombre', 'ubicacion'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}