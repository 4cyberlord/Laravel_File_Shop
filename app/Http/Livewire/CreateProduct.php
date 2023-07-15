<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class CreateProduct extends Component
{

    // public $title;

    public $state = [
        'title' => null,
        "slug" => null,
        "description" => null,
        "price" => "0.0",
        "live" => false,
    ];


    // Hook in Livewire based on the state. This is being created based on the action being performed (updated) and whats being performed on ($state.slug)

    public function updatedStateTitle($title)
    {
        $this->state['slug'] = Str::slug($title);
    }

    function submit()
    {
        dd('submit form');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
