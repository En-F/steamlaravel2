<x-app-layout>
    <x-errores/>
    <form action="{{ route('videojuegos.update',$videojuego) }}" method="POST">
        @method('PUT')
        @csrf
        <h2 class="text-2xl  font-bold mb-3">Modificar Videojuego</h2>
        <label for="nombre"  class="floating-label">
            <span>Nombre:*</span>
            <input type="text" id="nombre"  name="nombre" value="{{ old('nombre',$videojuego->nombre) }}"><br>
        </label>

        <label for="precio" class="floating-label">
            <span>Precio:*</span>
            <input type="text" id="precio"  name="precio" value="{{old('precio',$videojuego->precio)}}"><br>
        </label>

        <label for="lanzamiento" class="floating-label">
            <span>lanzamiento:*</span>
            <input type="text" id="lanzamiento"  name="lanzamiento" value="{{ old('lanzamiento',$videojuego->lanzamiento) }}"><br>
        </label>
        <br>
        <label for="nombre" class="floating-label">
            <span>Nombre Desarrolladora:*</span>
        </label>
        <select name="desarrolladora_id" id="desarrolladora_id" class="floating-label">
            @foreach ($desarrolladoras as $desarrolladora)
                <option
                value="{{$desarrolladora->id}}"
                {{  old('desarrolladora_id', $videojuego->desarrolladora_id) == $desarrolladora->id ? 'selected' : '' }}>
                {{ $desarrolladora->denominacion }}
                </option>
            @endforeach
        </select>
        <br>
        <div class="flex-2">
            <button class="btn btn-soft "> Modificar</button>
            <a href="{{ route('videojuegos.index') }}" class="btn btn-soft btn-info">Volver</a>
        </div>
    </form>
</x-app-layout>
