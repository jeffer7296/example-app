<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Almacen;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::with('almacen')->paginate(10);
        $almacenes = Almacen::all();
        return view('productos.index', compact('productos', 'almacenes'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'almacen_id'  => 'nullable|exists:almacenes,id',
        ]);

        Producto::create($datos);

        return redirect()->route('productos.index');
    }
}