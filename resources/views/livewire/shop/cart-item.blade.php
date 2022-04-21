<div>
    @if ($item)
        <div class="box mb-2">
            <p>
                <input wire:keydown="update" type="number" class="w-20" wire:model="count"> {{ $item[0]['title'] }}
                <button wire:click="update">Guardar</button>
            </p>
        </div>

    @endif
</div>
