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

    public function render()
    {
        dd(ContactGeneral::find(1)->person);
        //dd(ContactPerson::find(1)->general);
        return view('livewire.contact.general');
    }

    public function submit()
    {
        // ContactGeneral::create([
        //     'subject' => $this->subject,
        //     'type' => $this->type,
        //     'message' => $this->message
        // ]);

        ContactPerson::create([
            'name' => "Pepe",
            'contact_general_id' => 1,
            'surname' => "Pepe",
            'extra' => "Pepe",
            'email' => "Pepe",
        ]);
    }
}
