<x-app-layout>
    <div class="card bg-base-300 w-full shadow-sm p-6">
        <div class="bg-base-100 rounded-box shadow-md overflow-hidden">
            <div class="p-4 pb-2 opacity-60 tracking-wide text-xl border-b border-base-200">
                Deudas disponibles
            </div>

            <table class="table w-full">
                <thead>
                    <tr class="text-left bg-base-200">
                        <th class="p-4">Datos del propietario</th>
                        <th class="p-4">Cuota</th>
                        <th class="p-4">Importe / Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
