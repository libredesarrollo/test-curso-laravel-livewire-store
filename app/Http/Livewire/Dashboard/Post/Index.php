<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $confirmingDeleteCategory;
    public $postDelete;

    public function render()
    {
        $posts = Post::paginate(10);
        return view('livewire.dashboard.post.index',compact('posts'));
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
