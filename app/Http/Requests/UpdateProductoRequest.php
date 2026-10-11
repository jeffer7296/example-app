<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string|max:500',
            'precio'      => 'required|numeric|min:0|max:999999.99',
            'almacen_id'  => 'nullable|integer|exists:almacenes,id',
        ];
    }
}