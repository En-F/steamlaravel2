<x-app-layout>
    <form action="{{ route('generos.index') }}" method="GET">
    @csrf
        <div class="flex w-full ">
            <label for="buscar" class="floating-label">
                <span>Buscar</span>
                <input class="input" type="text" name="buscar" id="buscar"
                value="{{ $buscar }}">
            </label>
            <button class="btn btn-primary" type="submit">Buscar</button>
            <a class="btn btn-ghost" href="{{ route('generos.index') }}">Limpiar</a>
        </div>
    </form>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th>
            @php
                $sentido = $sentido == 'asc' ? 'desc' :'asc';
                $flecha = $sentido == 'asc' ? '↑' : '↓';
            @endphp
            <a class="btn btn-ghost" 
                href="{{ request()->fullUrlWithQuery(['sentido' => $sentido]) }}">
                Género {{ $flecha }}
            </a>
            </th>
            <th scope="col" class="px-6 py-3 font-medium">Acciones</th>
        </thead>
        <tbody>
            @foreach ($generos as $genero)
            <tr>
                <td class="px-6 py-4">{{ $genero->genero }}</td>
            <td>
                <form action="{{ route('generos.destroy',$genero->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-square btn-ghost" type="submit">🗑</button>
                </form>
            </td>
            <td>
                <a href="{{ route('generos.edit',$genero) }}">🖉</a>
            </td>   
            @endforeach
        </tbody>
    </table>
    <button class="btn">
        <a href="{{ route('generos.create') }}">
            Crear genero
        </a>
    </button>
    {{ $generos->links() }}
</x-app-layout>