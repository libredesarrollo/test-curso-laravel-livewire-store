<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class Save extends Component
{

    public $title;
    public $text;

    public $image;

    protected $rules =[
        'title' => 'required|min:2|max:500',
        //'slug' => 'max:500',
        'text' => 'nullable'
    ];

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    public function submit()
    {

        $this->validate();

        Category::create([
            'title' => $this->title,
            'slug' => str($this->title)->slug(),
            'body' => $this->text,
        ]);
    }
}
