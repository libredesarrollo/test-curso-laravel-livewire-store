<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Livewire\WithPagination;

use App\Http\Livewire\Dashboard\OrderTrait;
use App\Models\Category;
use App\Models\Post;

class Index extends Component
{

    use WithPagination;

    protected $queryString = ['search', 'category_id', 'type'];

    public $confirmingDeletePost;
    public $postDelete;

    // search
    public $search;

    // search date
    public $from;
    public $to;

    // filters
    public $type;
    public $posted;
    public $category_id;

    public $columns = [
        'id' => 'Id',
        'category_id' => 'Categoría',
        'title' => 'Título',
        'date' => 'Fecha',
        'description' => 'Descripción',
        'posted' => 'Posteado',
        'type' => 'Típo'
    ];

    public function render()
    {
        $posts =  Post::where('posted','yes');

        if ($this->search) {
            $posts
                ->where(function ($query) {
                    $query->orWhere('title', 'like', '%' . $this->search . '%')
                        ->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
        }

        if ($this->from && $this->to){
            $posts->whereBetween('date', [date($this->from), date($this->to)])->get();
        }

        if ($this->type) {
            $posts->where('type', $this->type);
        }

        if ($this->posted) {
            $posts->where('posted', $this->posted);
        }

        if ($this->category_id) {
            $posts->where('category_id', $this->category_id);
        }

        $posts = $posts->paginate(10);

        $categories = Category::pluck('id', 'title')->all();
        return view('livewire.blog.index', compact('posts', 'categories'))->layout("layouts.web");
    }

}