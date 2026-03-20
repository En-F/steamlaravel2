<x-app-layout>
    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Editar un gasto</h2>
        <form action="{{ route('gastos.update', $gasto) }}" method="POST"
            class="card bg-base-200 p-6 shadow">
            @method('PUT')
            @csrf
            <input class="text" type="hidden" name="gasto_id" value="{{ $gasto->id }}">
            <label for="concepto" class="floating-label">
                <span>Concepto:*</span>
                <input class="input" type="text" id="concepto"
                    name="concepto" value="{{ old('concepto', $gasto->concepto) }}"><br>
            </label>
            <label for="importe" class="floating-label">
                <span>Importe:*</span>
                <input class="input" type="number" id="importe"
                    name="importe" value="{{ old('importe', $gasto->importe) }}" step="0.01"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                type="submit">Editar</button>
                <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('gastos.index') }}">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
