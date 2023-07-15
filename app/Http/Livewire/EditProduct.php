<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;

class EditProduct extends Component
{
    public Products $product;


    public function render()
    {
        return view('livewire.edit-product');
    }
}
