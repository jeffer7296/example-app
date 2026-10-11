<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        return Proveedor::paginate(10);
    }

    public function store(StoreProveedorRequest $request)
    {
        return response()->json(Proveedor::create($request->validated()), 201);
    }

    public function show(Proveedor $proveedor)
    {
        return $proveedor;
    }

    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        $proveedor->update($request->validated());
        return $proveedor;
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return response()->noContent();
    }
}