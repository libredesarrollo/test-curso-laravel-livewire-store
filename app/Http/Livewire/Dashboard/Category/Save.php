<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class Save extends Component
{

    public $title;
    public $text;

    public $image;

    public $category;

    public function mount($id = null)
    {
        $this->init($id);
    }

    private function init($id)
    {
        $category = null;
        if ($id) {
            $category = Category::findOrFail($id);
        }

        $this->category = $category;

        //dd( $this->category);

        if ($this->category) {
            $this->title = $this->category->title;
            $this->text = $this->category->body;
            //$this->slug = $this->category->slug;
        }
    }

    protected $rules = [
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

        if ($this->category) {
            $this->category->update(
                [
                    'title' => $this->title,
                    'body' => $this->text,
                ]
            );
        } else
            Category::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'body' => $this->text,
            ]);
    }
}
