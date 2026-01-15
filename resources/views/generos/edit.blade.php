<x-app-layout>
    <x-errores/>
    <form action="{{ route('generos.update',$genero->id) }}" method="POST">
        @method('PUT')
        @csrf
        <h2>Modificar un Género</h2>
        <label for="" >
            <span>Genero:*</span>
            <input type="text" name="genero" id="genero" value="{{ old('genero',$genero->genero) }}">
        </label>
        <div class="flex-2">
            <button class="btn">Modificar</button>
            <a href="{{ route('generos.index') }}">Volver</a>
        </div>
    </form>
</x-app-layout>
