<div>
    @livewire('shop.cart-item', ['postId' => $post->id])
    <button wire:click="$emit('addItemToCart',{{ $post }})">Comprar</button>
</div>
 