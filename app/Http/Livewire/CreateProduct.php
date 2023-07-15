<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{

    // public $title;

    public $state = [
        'title' => null
    ];

    function submit()
    {
        dd('submit form');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
