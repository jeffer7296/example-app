<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlmacenRequest;
use App\Http\Requests\UpdateAlmacenRequest;
use App\Http\Resources\AlmacenResource;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::withCount('productos')->paginate(15);

        return AlmacenResource::collection($almacenes);
    }

    public function store(StoreAlmacenRequest $request)
    {
        $almacen = Almacen::create($request->validated());

        return (new AlmacenResource($almacen))
            ->response()->setStatusCode(201);
    }

    public function show(Almacen $almacen)
    {
        return new AlmacenResource($almacen->loadCount('productos'));
    }

    public function update(UpdateAlmacenRequest $request, Almacen $almacen)
    {
        $almacen->update($request->validated());

        return new AlmacenResource($almacen->loadCount('productos'));
    }

    public function destroy(Almacen $almacen)
    {
        // Regla de negocio: un almacén con productos no se puede eliminar.
        if ($almacen->productos()->exists()) {
            return response()->json([
                'message' => 'No se puede eliminar el almacén porque tiene productos asociados.',
            ], 409);
        }

        $almacen->delete();

        return response()->noContent(); // 204
    }
}