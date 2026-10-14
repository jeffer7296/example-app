<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Http\Resources\ProveedorResource;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        return ProveedorResource::collection(Proveedor::paginate(15));
    }

    public function store(StoreProveedorRequest $request)
    {
        $proveedor = Proveedor::create($request->validated());

        return (new ProveedorResource($proveedor))
            ->response()->setStatusCode(201);
    }

    public function show(Proveedor $proveedor)
    {
        return new ProveedorResource($proveedor);
    }

    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        $proveedor->update($request->validated());

        return new ProveedorResource($proveedor);
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return response()->noContent(); // 204
    }
}