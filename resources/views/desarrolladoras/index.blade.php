<x-app-layout>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default"></div>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th scope="col" class="px-6 py-3 font-medium">Nombre</th>
            <th scope="col" class="px-6 py-3 font-medium">Nombre Editora</th>
            <th scope="col" class="px-6 py-3 font-medium">Acciones</th>

        </thead>
        <tbody>
            @foreach ($desarrolladoras as $desarrolladora)
            <tr>
                <td class="px-6 py-4">{{ $desarrolladora->denominacion }}</td>
                <td class="px-6 py-4">{{ $desarrolladora->editora->nombre}}</td>
                <td>
                    <form action="{{ route('desarrolladoras.destroy',$desarrolladora->id   ) }}" method="post">
                    @method('DELETE')
                    @csrf
                        <button type="submit">🗑</button>
                    </form>
                </td>
                <td>
                    <button>
                        <a href="{{ route('desarrolladoras.edit',$desarrolladora) }}">🖉</a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn">
        <a href="{{ route('desarrolladoras.create') }}">
            Crear Desarrolladora
        </a>
    </button>
</x-app-layout>