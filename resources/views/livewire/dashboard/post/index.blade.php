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

        <a href="{{ route('d-post-create') }}" class="btn-secondary mb-3">Crear</a>

        <table class="table  w-full border">
            <thead>
                <tr class="text-left bg-gray-100 bold">
                    <th class="border-b p-2">
                        Id
                    </th>
                    <th class="border-b p-2">
                        Título
                    </th>
                    <th class="border-b p-2">
                        Fecha
                    </th>
                    <th class="border-b p-2">
                        Description
                    </th>
                    <th class="border-b p-2">
                        Tipo
                    </th>
                    <th class="border-b p-2">
                        Posted
                    </th>
                    <th class="border-b p-2">
                        Categoría
                    </th>
                    <th class="border-b p-2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td class="border-b p-2">
                            {{ $p->id }}
                        </td>
                        <td class="border-b p-2">
                            {{ $p->title }}
                        </td>
                        <td class="border-b p-2">
                            {{ $p->date }}
                        </td>
                        <td class="border-b p-2">
                            {{ $p->description }}
                        </td>
                        <td class="border-b p-2">
                            {{ $p->type }}
                        </td>
                        <td class="border-b p-2">
                            {{ $p->posted }}
                        </td>
                        <td class="border-b p-2">
                            {{ $p->category->title }}
                        </td>
                        <td class="border-b p-2">
                            <a href="{{ route('d-post-edit', $p) }}" class="mr-3">Editar</a>
                            <x-jet-danger-button {{-- onclick="confirm('Seguro que deseas eliminar el registro seleccionado?') || event.stopImmediatePropagation()" wire:click="delete({{ $p }})" --}} wire:click="selectToDelete({{ $p }})"
                                {{-- wire:click="$toggle('confirmingDeletePost')"
                                wire:click="$set('postDelete',{{ $p }})" --}}>
                                Eliminar
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>

        {{ $posts->links() }}

        <x-jet-confirmation-modal wire:model="confirmingDeletePost">
            <x-slot name="title">
                {{ __('Leave Team') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this category?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingDeletePost')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

    </div>
</x-card>
