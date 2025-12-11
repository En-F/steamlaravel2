<x-app-layout>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th scope="col" class="px-6 py-3 font-medium">Nombre</th>
            <th scope="col" class="px-6 py-3 font-medium">Desarralladora</th>
            <th scope="col" class="px-6 py-3 font-medium">Generos</th>
            <th scope="col" class="px-6 py-3 font-medium">Editoras</th>
        </thead>
        <tbody>
            @foreach ($videojuego->generos as $genero)
                <td class="px-6 py-4">{{ $videojuego->nombre }}</td>
                <td class="px-6 py-4">{{ $desarrolladora->denominacion }}</td>
                <td class="px-6 py-4">{{ $genero->genero }}</td>
                <td class="px-6 py-4">{{ $desarrolladora->editora->nombre }}</td>
            @endforeach
        </tbody>
    </table>
</x-app-layout>