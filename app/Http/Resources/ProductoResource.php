<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'nombre'      => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio'      => $this->precio,
            'almacen_id'  => $this->almacen_id,
            'almacen'     => new AlmacenResource($this->whenLoaded('almacen')),
        ];
    }
}