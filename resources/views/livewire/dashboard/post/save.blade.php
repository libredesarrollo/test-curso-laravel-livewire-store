<x-slot name="header">
    {{ __('Create Post') }}s
</x-slot>

<div class="container">
    <x-jet-action-message class="mr-3" on="delete">
        <div class="box-action-message">
            {{ __('Created.') }}
        </div>
    </x-jet-action-message>

    <x-jet-form-section submit="submit">

        <x-slot name="title">
            {{ __('Post Admin') }}
        </x-slot>

        <x-slot name="description">
            {{ __('...') }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Tìtulo</x-jet-label>
                @error('title')
                    <x-jet-input-error for="title" />
                @enderror
                <x-jet-input class="block w-full" type="text" wire:model="title" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Fecha</x-jet-label>
                @error('date')
                    <x-jet-input-error for="date" />
                @enderror
                <x-jet-input class="block w-full" type="date" wire:model="date" />

            </div>

            <div wire:ignore class="col-span-6 sm:col-span-4">
                <div id="ckcontent">{!! $content !!}</div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Contenido</x-jet-label>
                @error('content')
                    <x-jet-input-error for="content" />
                @enderror
                <textarea id="content" class="block w-full" type="text" wire:model="content"></textarea>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Descripcion</x-jet-label>
                @error('description')
                    <x-jet-input-error for="description" />
                @enderror
                <textarea class="block w-full" type="text" wire:model="description"></textarea>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Posted</x-jet-label>
                @error('posted')
                    <x-jet-input-error for="posted" />
                @enderror

                <select wire:model="posted">
                    <option value="not">No</option>
                    <option value="yes">Si</option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Típo</x-jet-label>
                @error('type')
                    <x-jet-input-error for="type" />
                @enderror

                <select wire:model="type">
                    <option value="adverd">adverd</option>
                    <option value="post">post</option>
                    <option value="courses">courses</option>
                    <option value="movies">movies</option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="">Categoría</x-jet-label>
                @error('category_id')
                    <x-jet-input-error for="category_id" />
                @enderror

                <select wire:model="category_id">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-3 sm:col-span-3">
                <x-jet-label for="image" value="{{ __('Image') }}" />
                <x-jet-input class="block w-full" type="file" wire:model="image" />
                @if ($post && $post->image)
                    <img class="w-40 mt-3" src="{{ $post->getImageUrl() }}">
                @endif
            </div>


            @slot('actions')
                <x-jet-button type="submit">Enviar</x-jet-button>
            @endslot

        </x-slot>
    </x-jet-form-section>

    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ckeditor/index.js') }}"></script>
    <script>
        document.addEventListener('livewire:load', function() {
            // console.log(@this.content)

            var ckeditor = null
            var editor = ClassicEditor.create(document.querySelector("#ckcontent"))
                .then(editor => {
                    ckeditor = editor
                    editor.model.document.on('change:data', (evt, data) => {
                        console.log(editor.getData());
                        @this.content = editor.getData()
                    });
                })
            console.log(editor)
            Livewire.hook('message.processed', (message, component) => {
                //console.log('message.processed');
                //console.log(message.updateQueue[0].name); // logs old data to console
                console.log(ckeditor)
                if (message.updateQueue[0].name == "content")
                    ckeditor.setData(@this.content)
            });
        })



        // $wire.content = 'bar'
    </script>
</div>
