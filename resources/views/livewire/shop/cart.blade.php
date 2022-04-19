<div>

    @livewire('shop.cart-item')


    <button wire:click="test">test</button>

    @if (session('cart'))

        @foreach (session('cart') as $c)
            <div class="box mb-2">



                <p><input type="number" class="w-20"> {{ $c }}</p>
            </div>
        @endforeach
    @endif
</div>
