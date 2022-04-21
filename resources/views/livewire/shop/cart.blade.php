<div>

    Carrito de compras

    @foreach ($cart as $c)
        @livewire('shop.cart-item', ['postId' => $c[0]['id']])
    @endforeach

</div>
