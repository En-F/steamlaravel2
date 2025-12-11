<x-app-layout>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default"></div>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <th scope="col" class="px-6 py-3 font-medium">Nombre</th>
            <th scope="col" class="px-6 py-3 font-medium">Acciones</th>

        </thead>
        <tbody>
            @foreach ($editoras as $editora)
            <tr>
                <td class="px-6 py-4">{{ $editora->nombre }}</td>
            <td>
                <form action="{{ route('editoras.destroy',$editora->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-square btn-ghost" type="submit">🗑</button>
                </form>
            </td>
            <td>
                <a href="{{ route('editoras.edit',$editora) }}">🖉</a>
            </td>   
            @endforeach
        </tbody>
    </table>
    <button class="btn">
        <a href="{{ route('editoras.create') }}">
            Crear Editora
        </a>
    </button>
</x-app-layout>