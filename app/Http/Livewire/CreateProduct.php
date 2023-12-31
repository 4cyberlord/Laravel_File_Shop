<?php

namespace App\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Arr;
use App\Models\File;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $uploads = [];

    public $files = [];


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

    protected array $rules = [
        'state.title' => 'required|max:255',
        'state.slug' => 'required|max:255|unique:products,slug',
        'state.description' => 'required',
        'state.price' => 'required|decimal:0,2|min:1',
        'state.live' => 'boolean'
    ];


    public function submit(): RedirectResponse
    {
        $this->validate();

        // dd("submit form");
        $product = auth()->user()->products()->create($this->state);


        // Attach the files after creating the product.

        // Get all the files we have and convert them into a file model and save them in one goal

        $files = collect($this->files)->map(function ($file) {
            return File::make([
                'filename' => $file->getClientOriginalName(),
                'path' => $file->store('files')
            ]);
        });


        $product->files()->saveMany($files);


        return redirect()->route('products');
    }


    public function updatedUploads($uploads)
    {
        $this->files = array_merge($this->files, $uploads);

        $this->uploads = [];
    }


    public function removeFile($filename)
    {
        $this->files = Arr::where($this->files, function ($file) use ($filename) {
            return $file->getFilename() !== $filename;
        });
    }


    public function render()
    {
        return view('livewire.create-product');
    }
}
