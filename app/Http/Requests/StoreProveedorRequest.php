<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'    => 'required|string|max:100',
            'ruc'       => 'required|digits:11|unique:proveedores,ruc',
            'telefono'  => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:150',
        ];
    }
}