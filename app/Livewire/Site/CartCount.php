<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Attributes\On; 
class CartCount extends Component
{
    public $cartCount;

    #[on("updateCartCounter")]
    public function mount()
    {
        $this->cartCount = Cart::getContent()->count();
    }
    public function render()
    {
        $this->mount();
        return view('livewire.site.cart-count');
    }
}