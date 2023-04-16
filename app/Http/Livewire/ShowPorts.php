<?php

namespace App\Http\Livewire;

use App\Models\Port;
use Livewire\Component;

class ShowPorts extends Component
{
    public $ports;
    public $limit;
    public $filter;
    public $addPort;
    public $message;

    public $code, $name, $city_id;

    public function mount()
    {
        $this->limit = 30;
        $this->addPort = false;
    }

    public function render()
    {
        $this->ports = Port::query()
            ->limit($this->limit)
            ->with('city')
            ->filter($this->filter)
            ->get();

        return view('livewire.show-ports');
    }

    public function search()
    {
    }

    public function addPort()
    {
        $this->addPort = true;
    }

    public function storePort()
    {
        $this->validate();
        try {

            $port = Port::query()->newModelInstance( [
                'code' => $this->code,
                'name' => $this->name,
                'city_id' => $this->city_id,
            ]);

            $port->latitude = 0;
            $port->longitude = 0;

            $port->save();

            session()->flash('success', 'Port Created Successfully!!');
            $this->resetFields();
            $this->addPort = false;
        } catch (\Exception $ex) {
            session()->flash('error', sprintf('Something goes wrong!! %s', $ex->getMessage()));
        }
    }

    public function cancelPort()
    {
        $this->addPort = false;
    }

    public function resetFields()
    {
        $this->code = '';
        $this->name = '';
        $this->city_id = '';
    }

    protected $rules = [
        'code' => 'required',
        'name' => 'required',
        'city_id' => 'required'
    ];
}
