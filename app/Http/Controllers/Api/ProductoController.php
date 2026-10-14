<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('almacen')->paginate(15);

        return ProductoResource::collection($productos);
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = Producto::create($request->validated());

        return (new ProductoResource($producto->load('almacen')))
            ->response()->setStatusCode(201);
    }

    public function show(Producto $producto)
    {
        return new ProductoResource($producto->load('almacen'));
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return new ProductoResource($producto->load('almacen'));
    }

    public function destroy(Producto $producto)
    {
        // Decisión documentada: el proyecto no tiene tabla de movimientos,
        // por eso no existe una regla que impida borrar un producto.
        $producto->delete();

        return response()->noContent(); // 204
    }
}