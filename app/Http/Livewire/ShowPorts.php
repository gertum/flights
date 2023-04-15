<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPorts extends Component
{
    public string $message;

    public function mount() {
        $this->message = "The message for 'show ports'";
    }

    public function render()
    {
        return view('livewire.show-ports');
    }
}
