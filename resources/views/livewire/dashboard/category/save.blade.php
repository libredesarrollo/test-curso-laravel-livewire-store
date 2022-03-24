<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Category') }}
    </h2>
</x-slot>

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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
            <label for="">Tìtulo</label>
            @error('title')
                <x-jet-input-error for="title" />
            @enderror
            <x-jet-input type="text" wire:model="title" />

            <label for="">Tìtulo</label>

            @error('text')
                <x-jet-input-error for="text" />
            @enderror

            <x-jet-input type="text" wire:model="text" />

            <x-jet-label for="image" value="{{ __('Image') }}" />
            <input type="file" wire:model="image">

            @if ($category && $category->image)
                <img class="w-40 mt-3" src="{{ $category->getImageUrl() }}">
            @endif

            <x-jet-button type="submit">Enviar</x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
