<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Http\Livewire\Dashboard\OrderTrait;
use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination;

    use OrderTrait;

    protected $queryString = ['search', 'category_id', 'posted', 'type'];

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
        $posts =  Post::orderBy($this->sortColumn, $this->sortDirection);

        //dd(Category::inRandomOrder()->first()->title);

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
            //dd($this->to);
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

        //$posts = $posts->toSql();
       // dd($posts);

        $categories = Category::pluck('id', 'title')->all();
        return view('livewire.dashboard.post.index', compact('posts', 'categories'));
    }

    public function delete()
    {
        $this->emit('delete');
        $this->postDelete->delete();
        $this->confirmingDeletePost = false;
    }

    public function selectToDelete(Post $post)
    {
        $this->confirmingDeletePost = true;
        $this->postDelete = $post;
    }
}
