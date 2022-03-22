<div>


    <form wire:submit.prevent="submit()">

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

        <x-jet-button type="submit">Enviar</x-jet-button>

    </form>

</div>
