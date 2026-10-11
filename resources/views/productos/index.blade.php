@extends('layouts.layout')

@section('contenido')
<div class="grid grid-cols-6 gap-3">

    <div class="col-span-2">
        <h1 class="text-3xl font-bold text-white">Lista de Productos</h1>
        <p class="text-yellow-300 italic">Bienvenido a la página de productos.</p>

        <form action="{{ route('productos.store') }}" method="POST" class="mt-5">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar Producto
            </button>

            <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre.."
                class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">
            <input type="text" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripción..."
                class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">
            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" placeholder="Precio..."
                class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">

            <select name="almacen_id" class="border border-gray-300 rounded py-2 px-4 w-full mt-3 bg-white text-black">
                <option value="">-- Sin almacén --</option>
                @foreach ($almacenes as $almacen)
                    <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                @endforeach
            </select>

            @if ($errors->any())
                <p class="mt-2 text-red-200">{{ $errors->first() }}</p>
            @endif
        </form>
    </div>

    <div class="col-span-4">
        <table class="table-auto w-full border border-gray-100 rounded-lg shadow-md">
            <thead class="text-white bg-gray-950 bg-opacity-25 p-4">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Almacén</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->almacen->nombre ?? 'Sin almacén' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $productos->links() }}</div>
    </div>
</div>
@endsection