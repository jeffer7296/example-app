<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProveedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'    => 'required|string|max:100',
            'ruc'       => [
                'required',
                'digits:11',
                Rule::unique('proveedores', 'ruc')->ignore($this->route('proveedor')),
            ],
            'telefono'  => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:150',
        ];
    }
}