<x-slot name="header">
    {{ __('Create Category') }}s
</x-slot>

<div class="container">
    <x-jet-action-message class="mr-3" on="delete">
        {{ __('Created.') }}
    </x-jet-action-message>

    <x-jet-form-section submit="submit">

        <x-slot name="title">
            {{ __('Category Admin') }}
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
                <x-jet-label for="">Text</x-jet-label>
                @error('text')
                    <x-jet-input-error for="text" />
                @enderror
                <x-jet-input class="block w-full" type="text" wire:model="text" />
            </div>

            <div class="col-span-3 sm:col-span-3">
                <x-jet-label for="image" value="{{ __('Image') }}" />
                <x-jet-input class="block w-full"  type="file" wire:model="image" />
                @if ($category && $category->image)
                    <img class="w-40 mt-3" src="{{ $category->getImageUrl() }}">
                @endif
            </div>


            @slot('actions')
                <x-jet-button type="submit">Enviar</x-jet-button>
            @endslot



        </x-slot>
    </x-jet-form-section>
</div>
