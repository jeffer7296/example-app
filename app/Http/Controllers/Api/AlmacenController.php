<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlmacenRequest;
use App\Http\Requests\UpdateAlmacenRequest;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function index()
    {
        return Almacen::paginate(10);
    }

    public function store(StoreAlmacenRequest $request)
    {
        return response()->json(Almacen::create($request->validated()), 201);
    }

    public function show(Almacen $almacen)
    {
        return $almacen;
    }

    public function update(UpdateAlmacenRequest $request, Almacen $almacen)
    {
        $almacen->update($request->validated());
        return $almacen;
    }

    public function destroy(Almacen $almacen)
    {
        $almacen->delete();
        return response()->noContent();
    }
}