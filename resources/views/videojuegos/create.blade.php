<x-app-layout>
    <x-errores/>
    <form action="/videojuegos" method="POST">
        @csrf
        <h2 class="text-2xl  font-bold mb-3">Insertar un videojuego</h2>
        <label for="nombre"  class="floating-label">
            <span>Nombre:*</span>
            <input type="text" id="nombre"  name="nombre" value="{{ old('nombre') }}"><br>
        </label>

        <label for="precio" class="floating-label">
            <span>Precio:*</span>
            <input type="text" id="precio"  name="precio" value="{{ old('precio') }}"><br>
        </label>

        <label for="lanzamiento" class="floating-label">
            <span>lanzamiento:*</span>
            <input type="date" id="lanzamiento"  name="lanzamiento" value="{{ old('lanzamiento') }}"><br>
        </label>

        <label for="nombre" class="floating-label">
            <span>Nombre Desarrolladora:*</span>
        </label>
        <select name="desarrolladora_id" id="desarrolladora_id" class="floating-label">
            @foreach ($desarrolladoras as $desarrolladora)
                <option
                value="{{$desarrolladora->id}}"
                {{ old('desarrolladora_id') == $desarrolladora->id ? 'selected':''}}>
                {{ $desarrolladora->denominacion }}
                </option>
            @endforeach
        </select>
        <div class="mt-6 mb-4">
                <label for="imagen" class="floating-label">
                    <span>Imagen:</span>
                    <input class="file-input" type="file" id="imagen"
                    name="imagen" value="{{ old('imagen') }}">
                </label>
            </div>
        <br>
        <div class="flex-2">
            <button class="btn btn-soft "> Insertar</button>
            <a href="{{ route('videojuegos.index') }}" class="btn btn-soft btn-info">Volver</a>
        </div>
    </form>
</x-app-layout>
