<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;

class Todo extends Component
{
    public $task;
    public $todos;

    protected $rules = [
        'name' => "required|min:2|max:255",
    ];

    protected $listeners = ['setOrden', 'setOrdenByIds', 'deleteById'];

    public function render()
    {
        $this->todos = ModelsTodo::where('user_id', auth()->id())->orderBy('count')->get()->toArray();
        return view('livewire.todo.todo');
    }

    public function save()
    {
        ModelsTodo::create(
            [
                'name' => $this->task,
                'user_id' => auth()->id(),
                'count' => ModelsTodo::where('user_id', auth()->id())->count()
            ]
        );
    }
    public function setOrden()
    {

        foreach ($this->todos as $orden => $t) {
            ModelsTodo::where('id', $t['id'])->update(['count' => $orden]);
        }
        // foreach ($this->todos as $orden => $t)
        //     if ($t['id'] != $todoId)
        //         ModelsTodo::where('id', $t['id'])->update(['count' => $orden]);
        // ModelsTodo::where('id', $todoId)->update(['count' => $count]);
    }
    public function setOrdenByIds($ids)
    {
        foreach ($ids as $orden => $id) {
            ModelsTodo::where('id', $id)->where('count', "!=", $orden)->update(['count' => $orden]);
        }
        // foreach ($this->todos as $orden => $t)
        //     if ($t['id'] != $todoId)
        //         ModelsTodo::where('id', $t['id'])->update(['count' => $orden]);
        // ModelsTodo::where('id', $todoId)->update(['count' => $count]);
    }

    public function deleteById($id)
    {
        ModelsTodo::where('id', $id)->delete();
    }
}
