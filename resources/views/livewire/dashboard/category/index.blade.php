<x-card>
    <div>
        @slot('title')
            Listado
        @endslot

        <x-jet-action-message class="mr-3" on="delete">
            <div class="box-action-message">
                {{ __('Delete.') }}
            </div>
        </x-jet-action-message>

        <p>Categoría a eliminar: {{ $this->category }}</p>

        <a href="{{ route('d-category-create') }}" class="btn-secondary mb-3">Crear</a>

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
                    <tr>
                        <td class="border-b p-2">
                            {{ $c->title }}
                        </td>
                        <td class="border-b p-2">
                            <a href="{{ route('d-category-edit', $c) }}" class="mr-3">Editar</a>
                            <x-jet-danger-button {{-- onclick="confirm('Seguro que deseas eliminar el registro seleccionado?') || event.stopImmediatePropagation()" wire:click="delete({{ $c }})" --}} wire:click="selectToDelete({{ $c }})"
                                {{-- wire:click="$toggle('confirmingDeleteCategory')"
                                wire:click="$set('categoryDelete',{{ $c }})" --}}>
                                Eliminar
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>

        {{ $categories->links() }}

        <x-jet-confirmation-modal wire:model="confirmingDeleteCategory">
            <x-slot name="title">
                {{ __('Leave Team') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete <b>'. $this->category .'</b> category?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingDeleteCategory')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

    </div>
</x-card>
