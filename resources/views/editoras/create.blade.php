<x-app-layout>
    <x-errores/>
    <form action="{{ route('editoras.index') }}" method="POST">
        @csrf
        <h2 class="text-2xl  font-bold mb-3">Insertar una Editora</h2>
        <label for="nombre"  class="floating-label">
            <span>Nombre:*</span>
            <input type="text" id="nombre"  name="nombre" value="{{ old('nombre') }}" ><br>
        </label>
        <div class="flex-2">
            <button class="btn btn-soft "> Insertar</button>
            <a href="{{ route('editoras.index') }}" class="btn btn-soft btn-info">Volver</a>
        </div>

    </form>

</x-app-layout>