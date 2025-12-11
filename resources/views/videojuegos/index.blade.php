<x-app-layout>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default"></div>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th scope="col" class="px-6 py-3 font-medium">Nombre</th>
            <th scope="col" class="px-6 py-3 font-medium">Precio</th>
            <th scope="col" class="px-6 py-3 font-medium">Lanzamiento</th>
            <th scope="col" class="px-6 py-3 font-medium">Nombre de Desarrolladora</th>
            <th scope="col" class="px-6 py-3 font-medium">Acciones</th>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
            <tr>
                <td>
                    <a class="link link-primary" href="{{ route('videojuegos.show',$videojuego) }}">
                       {{ $videojuego->nombre }}
                    </a>
                </td>
                <td class="px-6 py-4">{{ $videojuego->precio_formateado }}</td>
                <td class="px-6 py-4">{{ $videojuego->lanzamiento_formateado }}</td>
                <td class="px-6 py-4">{{ $videojuego->desarrolladora->denominacion }}</td>
                <td>
                    <form action="{{ route('videojuegos.destroy',$videojuego->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                        <button  class="btn btn-square btn-ghost" type="submit">🗑</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('videojuegos.edit',$videojuego) }}">
                        🖉
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn">
        <a href="{{ route('videojuegos.create') }}">
            Crear Videojuego
        </a>
    </button>
</x-app-layout>