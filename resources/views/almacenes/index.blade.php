@extends('layouts.layout')

@section('contenido')
<div class="grid grid-cols-6 gap-3">

    <div class="col-span-2">
        <h1 class="text-3xl font-bold text-white">Lista de Almacenes</h1>
        <p class="text-yellow-300 italic">Bienvenido a la página de almacenes.</p>

        @if (session('ok'))
            <p class="mt-3 text-green-200">{{ session('ok') }}</p>
        @endif

        <form action="{{ route('almacenes.store') }}" method="POST" class="mt-5">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar Almacén
            </button>

            <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre.."
                class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">
            @error('nombre') <small class="text-red-200">{{ $message }}</small> @enderror

            <input type="text" name="ubicacion" value="{{ old('ubicacion') }}" placeholder="Ubicación..."
                class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">
            @error('ubicacion') <small class="text-red-200">{{ $message }}</small> @enderror
        </form>
    </div>

    <div class="col-span-4">
        <table class="table-auto w-full border border-gray-100 rounded-lg shadow-md">
            <thead class="text-white bg-gray-950 bg-opacity-25 p-4">
                <tr>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Productos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($almacenes as $almacen)
                    <tr>
                        <td>{{ $almacen->nombre }}</td>
                        <td>{{ $almacen->ubicacion }}</td>
                        <td>{{ $almacen->productos_count }}</td>
                        <td>
                            <form action="{{ route('almacenes.destroy', $almacen) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar este almacén?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-200 hover:text-red-400">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-white">Aún no hay almacenes registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $almacenes->links() }}</div>
    </div>
</div>
@endsection