<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $confirmingDeleteCategory;
    public $categoryDelete;

    public function render()
    {
        //$this->confirmingDeleteCategory = true;
        $categories = Category::paginate(10);
        return view('livewire.dashboard.category.index',compact('categories'));
    }

    public function delete(/*Category $category*/)
    {
        $this->emit('delete');
        $this->categoryDelete->delete();
        $this->confirmingDeleteCategory = false;
    }

    public function selectToDelete(Category $category)
    {
        $this->confirmingDeleteCategory = true;
        $this->categoryDelete = $category;
    }

}
