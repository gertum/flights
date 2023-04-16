<?php

namespace App\Http\Livewire;

use App\Models\Port;
use Livewire\Component;

class ShowPorts extends Component
{
    public $ports;
    public $limit;
    public $filter;

    public function mount() {
        $this->limit = 30;
    }

    public function render()
    {
        $this->ports = Port::query()
            ->limit($this->limit)
            ->filter($this->filter)
            ->get();
        return view('livewire.show-ports');
    }

    public function search() {
    }
}
