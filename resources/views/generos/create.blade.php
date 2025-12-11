<x-app-layout>
    <x-errores/>
    <form action="{{ route('generos.index') }}" method="Post">
        @csrf
        <h2 class="text-2xl font-bold mb-3">Insertar un Género</h2>
        <label for="genero" class="floating-label">
            <span>Genero:*</span>
            <input type="text" name="genero" id="genero" value="{{ old('genero') }}">
        </label>
    <div>
        <button class="btn btn-ghost">Insertar</button>
        <a href={{ route('generos.index') }}>Volver</a>
    </div>
    </form>
</x-app-layout>