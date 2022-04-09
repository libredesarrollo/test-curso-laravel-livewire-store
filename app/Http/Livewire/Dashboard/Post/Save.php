<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $title;
    public $date;
    public $description;
    public $content;
    public $posted;
    public $type;
    public $image;
    public $category_id;

    public $post;

    protected $rules = [
        'title' => "required|min:2|max:255",
        'description' => "required|min:2|max:255",
        'content' => "required|min:2|max:5000",
        'posted' => "required",
        'type' => "required",
        'category_id' => "required",
        'date' => "required",
        'image' => 'nullable|image|max:1024'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->post = Post::findOrFail($id);
            $this->title = $this->post->title;
            $this->content = $this->post->content;
            $this->description = $this->post->description;
            $this->posted = $this->post->posted;
            $this->type = $this->post->type;
            $this->category_id = $this->post->category_id;
            $this->date = $this->post->date;
        }
    }

    public function render()
    {
        //Log::info("render");
        $categories = Category::get();
        return view('livewire.dashboard.post.save', compact('categories'));
    }

    public function submit()
    {

        $this->validate();

        if ($this->post)
            $this->post->update([
                'title' => $this->title,
                'content' => $this->content,
                'description' => $this->description,
                'posted' => $this->posted,
                'type' => $this->type,
                'category_id' => $this->category_id,
                'date' => $this->date,
            ]);
        else
            $this->post = Post::create(
                [
                    'title' => $this->title,
                    'content' => $this->content,
                    'description' => $this->description,
                    'posted' => $this->posted,
                    'type' => $this->type,
                    'slug' => str($this->title)->slug(),
                    'category_id' => $this->category_id,
                    'date' => $this->date,
                ]
            );

        if ($this->image) {
            // imagen cargada
            $imageName = str($this->title)->slug() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images/post', $imageName, 'public_upload');
            $this->post->update(
                [
                    'image' => $imageName
                ]
            );
        }

        $this->emit('saved');
    }

}
