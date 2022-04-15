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

        <div class="grid grid-cols-2 gap-2 mb-3">
            <x-jet-input class="block w-full" type="text" wire:model="search" placeholder="Buscar por título o id" />
            <div class="grid grid-cols-2 gap-2">
                <x-jet-input class="block w-full" type="date" wire:model="from" placeholder="Fecha inicio" />
                <x-jet-input class="block w-full" type="date" wire:model="to" placeholder="Fecha Fin" />
            </div>
        </div>

        <div class="flex gap-2 mb-3">


            <select class="w-full" wire:model="posted">
                <option value="">Posted</option>
                <option value="not">No</option>
                <option value="yes">Si</option>
            </select>


            <select class="w-full" wire:model="type">
                <option value="">{{ __('Type') }}</option>
                <option value="adverd">adverd</option>
                <option value="post">post</option>
                <option value="courses">courses</option>
                <option value="movies">movies</option>
            </select>


            <select class="w-full" wire:model="category_id">
                <option value="">{{ __('Category') }}</option>
                @foreach ($categories as $c => $i)
                    <option value="{{ $i }}">{{ $c }}</option>
                @endforeach
            </select>

        </div>

        <table class="table  w-full border">
            <thead>
                <tr class="text-left bg-gray-100 bold">

                    @foreach ($columns as $key => $c)
                        <th class="p-3 border" wire:click="sort('{{ $key }}')">
                            <button>
                                {{ $c }}
                                @if ($sortColumn == $key)
                                    @if ($sortDirection == 'asc')
                                        &uarr;
                                    @else
                                        &darr;
                                    @endif
                                @endif
                            </button>
                        </th>
                    @endforeach
                    <th class="border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td class="border-b p-2">
                            {{ $p->id }}
                        </td>
                        <td class="border-b p-2">
                            {{ str($p->title)->substr(0, 15) }}...
                        </td>
                        <td class="border-b p-2">
                            {{ $p->date }}
                        </td>
                        <td class="border-b p-2">
                            <textarea class="w-52">
                                {{ $p->description }}
                            </textarea>
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
    <script>

        window.onload = function() {
    
            Livewire.hook("element.updated", (el, component) => {
                // console.log("aaa"+el)
            })
            Livewire.hook("element.updating", (fromEl, toEl, component) => {
                //  console.log(fromEl)
            })
            Livewire.hook("element.removed", (fromEl, toEl, component) => {
                //console.log("element.removed")
                console.log(fromEl)
            })
            Livewire.hook("message.sent", (message, component) => {
                //console.log("message.sent")
               // console.log(message.updateQueue[0].payload.method)
            })
            Livewire.hook("message.processed", (message, component) => {
               // console.log("message.processed")
                //console.log(message)
            })
        }

        // $wire.content = 'bar'
    </script>
</x-card>
