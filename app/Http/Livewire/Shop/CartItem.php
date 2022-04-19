<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class CartItem extends Component
{

    public $post;
    public $count;

    protected $listeners = ['add'];

    public function mount()
    {
        # code...
    }

    public function add($post, $count = 1)
    {
        dd("aaaa");
        if (!session()->has('cart')) {
            session(['cart' => []]);
        }

        $cart = session("cart");



        $cart[$post->id] = [$post, $count];

        session("cart",$cart);
    }

    public function render()
    {
        //dd(session("cart"));
        return view('livewire.shop.cart-item');
    }
}
