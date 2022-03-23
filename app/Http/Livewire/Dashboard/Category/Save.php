<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Save extends Component
{

    public $title;

    public $text;

    public $image;

    public $category;

     public function hydrate()
     {
        
         Log::info("hydrate");
        // $this->hydratedName = 'Peter';
         
     }
     public function hydrateTitle()
     {
         Log::info("hydrateTitle");
     }


    public function boot()
    {
        Log::info("boot");
    }

    public function booted()
    {
        Log::info("booted");
    }

    public function mount($id = null)
    {
        //echo "mount";
        //$this->title = "John";
        Log::info("mount");
        $this->init($id);
    }

    public function dehydrate()
    {
       // echo "dehydrate";
      
       Log::info("dehydrate");
    }

    public function dehydrateTitle($value)
    {
        //echo "dehydrateTitle $value";
        Log::info("dehydrateTitle $value");
    }

    public function updating($name, $value)
    {
       // $this->title = 'Peter';
       $this->image++;
        Log::info("updating $name - $value");
        //$this->title =  "updating".time();
        //echo "$name $value";
        //$this->title = "ssss";
    }
    public function updated($name, $value)
    {
       // $this->title = 'Peter';
        
        Log::info("updated $name - $value");
        //$this->title =  "updating".time();
        //echo "$name $value";
        //$this->title = "ssss";
    }
    public function updatingTitle($value)
    {
        Log::info("updatingTitle $value");
        //$this->title =  "updating".time();
        //echo "$name $value";
        //$this->title = "ssss";
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
        Log::info("render");
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
