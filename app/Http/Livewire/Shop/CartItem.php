<?php

namespace App\Http\Livewire\Shop;

use App\Models\ShoppingCart;
use Illuminate\Support\Arr;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class CartItem extends Component
{
    //gestion
    public $count;

    // referencia
    public $item;

    protected $listeners = ['addItemToCart' => 'add'];

    public function mount($postId)
    {
        $session = new Session();
        $cart = $session->get('cart', []);
        if (Arr::exists($cart, $postId)) {
            $this->item = $cart[$postId];
            $this->count = $this->item[1];
        }
    }

    public function add($post, $count = 1)
    {
        $session = new Session();
        $cart = $session->get('cart', []);

        // eliminar
        if ($count <= 0) {
            if (Arr::exists($cart, $post['id'])) {
                unset($cart[$post['id']]);
                unset($this->item);
                $session->set('cart', $cart);
                $this->saveDB($cart);
                $this->emit("itemDelete");
            }
            return;
        }

        // agregar
        if (Arr::exists($cart, $post['id'])) {
            $this->emit("itemChange", $post);
            $cart[$post['id']][1] = $count;
        } else {
            $this->emit("itemAdd", $post);
            $cart[$post["id"]] = [$post, $count];
        }

        $this->item = $cart[$post['id']];
        $this->count = $this->item[1];

        $session->set('cart', $cart);
        //dd($session->get('cart', []));

        $this->saveDB($cart);
    }

    private function saveDB($cart)
    {
        // actualizar/agregar existentes

        $control = time();

        if (auth()->check()) {
            foreach ($cart as $c) {
                ShoppingCart::updateOrCreate(
                    [
                        'post_id' => $c[0]['id'],
                        'user_id' => auth()->id()
                    ],
                    [
                        'post_id' => $c[0]['id'],
                        'count' => $c[1],
                        'user_id' => auth()->id(),
                        'control' => $control
                    ]
                );
            }

            // borrar anteriores
            ShoppingCart::whereNot('control', $control)->where('user_id', auth()->id())->delete();

            //dd(auth()->user()->cartItems());

            //auth()->user()->cartItems()->syncWithPivotValues(1, ['s' => 1]);
        }
    }

    public function update()
    {
        $this->add($this->item[0], $this->count);
    }

    public function render()
    {
        return view('livewire.shop.cart-item');
    }
}
