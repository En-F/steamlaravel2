<x-app-layout>
    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Insertar un ingreso</h2>
        <form action="{{ route('ingresos.store') }}" method="POST"
            enctype="multipart/form-data"
            class="card bg-base-200 p-6 shadow">
            @csrf
            <input type="hidden" name="propietario_id" value="{{ $id }}">
            <label for="anyo" class="floating-label">
                <span>Año:</span>
                <input class="input" type="text" id="anyo"
                    name="anyo" value="{{ old('anyo') }}"><br>
            </label>
            <label for="mes" class="floating-label">
                <span>Mes:</span>
                <input class="input" type="text" id="mes"
                    name="mes" value="{{ old('mes') }}"><br>
            </label>
            <label for="importe" class="floating-label">
                <span>Importe:</span>
                <input class="input" type="text" id="importe"
                    name="importe" value="{{ $operacion }}"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                type="submit">Insertar</button>
            </div>
        </form>
    </div>
</x-app-layout>
