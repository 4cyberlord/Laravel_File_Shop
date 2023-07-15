<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class CreateProduct extends Component
{

    // public $title;

    public $state = [
        'title' => null,
        'slug' => null,
        'description' => null,
        'price' => '0.00',
        'live' => false,
    ];


    // Hook in Livewire based on the state. This is being created based on the action being performed (updated) and whats being performed on ($state.slug)

    public function updatedStateTitle($title)
    {
        $this->state['slug'] = Str::slug($title);
    }

    protected $rules = [
        'state.title' => 'required|max:255',
        'state.slug' => 'required|max:255|unique:products,slug',
        'state.description' => 'required',
        'state.price' => 'required|decimal:0,2|min:1',
        'state.live' => 'boolean'
    ];


    public function submit()
    {
        $this->validate();

        dd("submit form");
    }


    public function render()
    {
        return view('livewire.create-product');
    }
}
