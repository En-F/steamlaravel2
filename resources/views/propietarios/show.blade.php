<x-app-layout>
    <div class="card bg-base-300 w-full shadow-sm p-6">
        <h2 class="card-title text-3xl uppercase tracking-wide mb-4">
            {{ $propietario->dni }} - {{ $propietario->nombre }}
        </h2>

        <div class="bg-base-100 rounded-box shadow-md overflow-hidden">
            <div class="p-4 pb-2 opacity-60 tracking-wide text-xl border-b border-base-200">
                Datos básicos
            </div>

            <table class="table w-full">
                <thead>
                    <tr class="text-left bg-base-200">
                        <th class="p-4">Planta</th>
                        <th class="p-4">Puerta</th>
                        <th class="p-4">Cuota</th>
                        <th class="p-4">Deuda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                    <tr class="hover:bg-base-200 transition-colors border-b border-base-200">
                        <td class="p-4">{{ $propietario->planta }}</td>
                        <td class="p-4">{{ $propietario->puerta }}</td>
                        <td class="p-4">{{ $propietario->cuota }}</td>
                        <td class="p-4">
                            <span class="badge badge-error">{{ $item->importe }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a  class="hidden" href="{{ route('ingresos.create', ['propietario' => $propietario->id]) }}" class="btn btn-soft btn-info">Crear Ingreso</a>
</x-app-layout>
