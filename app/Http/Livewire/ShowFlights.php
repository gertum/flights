<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowFlights extends Component
{

    public $laukas;
    public function render()
    {
        return view('livewire.show-flights');
    }
}
