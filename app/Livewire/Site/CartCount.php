<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartCount extends Component
{
    public $cartCount;
    public function render()
    {
        $this->cartCount = Cart::getContent()->count();

        return view('livewire.site.cart-count');
    }
}
