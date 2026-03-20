<x-app-layout>
    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Insertar un Gasto nuevo</h2>
        <form action="{{ route('gastos.store') }}" method="POST"
            enctype="multipart/form-data"
            class="card bg-base-200 p-6 shadow">
            @csrf
            <label for="concepto" class="floating-label">
                <span>Concepto:*</span>
                <input class="input" type="text" id="concepto"
                    name="concepto" value="{{ old('concepto') }}"><br>
            </label>
            <label for="importe" class="floating-label">
                <span>Importe:*</span>
                <input class="input" type="number" id="importe"
                    name="importe" value="{{ old('importe') }}" step="0.01"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                type="submit">Insertar</button>
                <a href="{{route('gastos.index')}}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
