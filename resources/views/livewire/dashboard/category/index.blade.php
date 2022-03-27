
<x-card>
    <div>
        
        @slot('title')
            Listado
        @endslot
    
        <x-jet-action-message class="mr-3" on="delete">
            {{ __('Delete.') }}
        </x-jet-action-message>
    
        <table class="table  w-full border">
            <thead>
                <tr class="text-left bg-gray-100 bold">
                    <th class="border-b p-2">
                        Título
                    </th>
                    <th class="border-b p-2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr >
                        <td class="border-b p-2">
                            {{ $c->title }}
                        </td>
                        <td class="border-b p-2">
                            <a href="{{ route('d-category-edit', $c) }}" class="mr-3">Editar</a>
                            <x-jet-danger-button
                                onclick="confirm('Seguro que deseas eliminar el registro seleccionado?') || event.stopImmediatePropagation()"
                                wire:click="delete({{ $c }})">
                                Eliminar
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <br>
    
        {{ $categories->links() }}
    
    </div>
</x-card>
