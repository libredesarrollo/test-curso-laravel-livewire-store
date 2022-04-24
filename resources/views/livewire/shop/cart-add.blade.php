<div>
    @livewire('shop.cart-item', ['postId' => $post->id])
    <button wire:click="$emit('addItemToCart',{{ $post }})">Comprar</button>

    <a class="fixed right-0 bottom-0 m-5" href="{{ route('shop-cart-list') }}">
        <div class="-right-1 -top-1 absolute rounded-full bg-red-700 text-white w-5 h-5 text-center text-sm">
            {{ $total }}
        </div>
        <div class="p-2 w-11 h-11 rounded-full bg-purple-500 shadow border-2 border-purple-800 border-r">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="#FFF" viewBox="0 0 24 24">
                <path
                    d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" />
            </svg>
        </div>
    </a>
</div>
