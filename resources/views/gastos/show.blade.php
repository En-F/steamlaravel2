<x-app-layout>
    <div class="card bg-base-300 w-full shadow-sm p-6">
        <h2 class="card-title text-3xl uppercase tracking-wide mb-4">
            Concepto: {{ $gasto->concepto }}
        </h2>

        <div class="bg-base-100 rounded-box shadow-md overflow-hidden">

            <table class="table w-full">
                <thead>
                    <tr class="text-left bg-base-200">
                        <th class="p-4">Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-base-200 transition-colors border-b border-base-200">
                        <td class="p-4">{{ $gasto->importe }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
