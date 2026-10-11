<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::withCount('productos')->paginate(10);
        return view('almacenes.index', compact('almacenes'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre'    => 'required|string|max:100',
            'ubicacion' => 'required|string|max:150',
        ]);

        Almacen::create($datos);

        return redirect()->route('almacenes.index')
                         ->with('ok', 'Almacén guardado correctamente.');
    }

    public function destroy(Almacen $almacen)
    {
        $almacen->delete();
        return redirect()->route('almacenes.index')
                         ->with('ok', 'Almacén eliminado.');
    }
}