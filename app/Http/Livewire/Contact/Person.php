<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactPerson;
use Livewire\Component;

class Person extends Component
{
    public $name;
    public $surname;
    public $choices;
    public $other;
    public $parentId;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'surname' => 'required|min:2|max:255',
        'choices' => 'required',
        'other' => 'nullable'
    ];

    protected $listeners = ['parentId'];

    public function mount()
    {
        //$this->name = time();
    }

    public function render()
    {
        return view('livewire.contact.person');
    }

    public function parentId($parentId)
    {
        $this->parentId = $parentId;
    }

    public function submit()
    {
        $this->validate();
        
        ContactPerson::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'choices' => $this->choices,
            'contact_general_id' => $this->parentId,
            'other' => $this->other
        ]);
        
        $this->emit('stepEvent', 3);
    }
}
