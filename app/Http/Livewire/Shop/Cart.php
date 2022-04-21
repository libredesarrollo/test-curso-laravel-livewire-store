<?php

namespace App\Http\Livewire\Shop;

use App\Models\Post;

use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class Cart extends Component
{
    public $types = ['list', 'add'];

    public $cart = 'list';

    public $type = 'list';
    public $post;

    public function mount($post, $type = "list")
    {
        $session = new Session();
        $this->cart = $session->get('cart', []);

   
        foreach ($this->cart as $key => $c) {
            # code...
          //  dd($c[0]);
        }
        $this->post = $post;
        $this->type = $type;
    }

    public function test()
    {
        $this->emit("add", Post::find(3));
    }

    public function render()
    {
        if ($this->type == "list")
            return view('livewire.shop.cart')->layout("layouts.web");

        return view('livewire.shop.cart-add')->layout("layouts.web");
    }
}
