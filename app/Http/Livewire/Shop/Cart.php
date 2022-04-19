<?php

namespace App\Http\Livewire\Shop;

use App\Models\Post;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class Cart extends Component
{
    public $types = ['list', 'add'];

    public $type;
    public $pk;

    public function mount($type = "list", $pk = 0)
    {
        $this->initSessionCart();
        $this->type = $type;
        $this->pk = $pk;
    }

    private function initSessionCart()
    {
       // dd($this->emit("addItemToCart", Post::find(1)));
        $this->emit("add", Post::find(1),1);
        $this->emit("add", Post::find(2));
        $this->emit("add", Post::find(3));

        //     if (!session()->has('cart')) {
        //         session(['cart' => []]);


        //         // dd(session('cart'));
        //         session(['cart' => [$post1, $post2, $post3]]);
        //     }
    }

    public function test()
    {
        $this->emit("add", Post::find(3));
    }

    public function render()
    {
        // if(type)
        
        return view('livewire.shop.cart')->layout("layouts.web");
    }
}
