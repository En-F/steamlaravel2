<x-app-layout>
    <table class="table">
        <thead>
            <th>Concepto</th>
            <th>Importe</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($gastos as $gasto)
                <tr>
                    <td>
                        <a class="link link-primary"
                           href="{{ route('gastos.show', $gasto) }}">
                            {{ $gasto->concepto }}
                        </a>
                    </td>
                    <td>{{ $gasto->importe }}</td>
                    <td>
                        <div class="flex gap-2">
                            <a
                                class="btn btn-sm btn-ghost btn-info"
                                href="{{ route('gastos.edit', $gasto) }}"
                            >
                                Editar
                            </a>
                                <form
                                    method="POST"W
                                    action="{{ route('gastos.destroy', $gasto) }}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-ghost btn-error"
                                        onclick="return confirm('¿Está seguro de que desea eliminar este gasto?')"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('gastos.create') }}">Dar de alta un nuevo gasto</a>
</x-app-layout>
