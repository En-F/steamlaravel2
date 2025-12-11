<x-app-layout>
    <x-errores/>
    <form action="{{ route('desarrolladoras.update',$desarrolladora->id) }}" method="POST">
        @method('PUT')
        @csrf
        <h2 class="text-2xl  font-bold mb-3">Modificar Desarrolladora</h2>
        <label for="denominacion"  class="floating-label">
            <span>Nombre:*</span>
            <input type="text" id="denominacion"  name="denominacion" value="{{ old('denominacion',$desarrolladora->denominacion) }}"><br>
        </label>

        <label for="editora_id" class="floating-label">
            <span>Editora:*</span>
        </label>
        <select name="editora_id" id="editora_id">
            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}"
                {{ old('editora_id', $desarrolladora->editora_id) == $editora->id ? 'selected' : ''}}>
                {{ $editora->nombre }}</option>
            @endforeach
        </select>    
        <br>
        <div class="flex-2">
            <button class="btn btn-soft "> Modificar</button>
            <a href="{{ route('desarrolladoras.index') }}" class="btn btn-soft btn-info">Volver</a>
        </div>
    </form>
</x-app-layout>