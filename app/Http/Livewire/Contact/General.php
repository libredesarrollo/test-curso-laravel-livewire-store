<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactGeneral;
use App\Models\ContactPerson;
use Livewire\Component;

class General extends Component
{

    public $subject;
    public $type;
    public $message;

    // form
    public $step=1;

    protected $rules = [
        'subject' => "required|min:2|max:255",
        'type' => "required",
        'message' => "required|min:2",
    ];

    protected $listeners = ['stepEvent' => 'stepEvent'];

    public function render()
    {
        //dd(ContactGeneral::find(1)->person);
        //dd(ContactPerson::find(1)->general);
        return view('livewire.contact.general');
    }

    public function submit()
    {

        if($this->type == "company")
            $this->step = 2;
        elseif($this->type == "person")
            $this->step = 2.5;

        return;

        $this->validate();

        return ContactGeneral::create([
            'subject' => $this->subject,
            'type' => $this->type,
            'message' => $this->message
        ]);

        ContactPerson::create([
            'name' => "Pepe",
            'contact_general_id' => 1,
            'surname' => "Pepe",
            'extra' => "Pepe",
            'email' => "Pepe",
        ]);
    }

    //*************** EVENTOS */

    public function stepEvent($step)
    {
        $this->step = $step;
    }
}
