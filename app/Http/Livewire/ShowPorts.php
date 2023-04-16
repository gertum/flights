<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Port;
use Exception;
use Illuminate\Support\Enumerable;
use Livewire\Component;

class ShowPorts extends Component
{
    public $ports;

    public $limit;
    public $filter;
    public $addPort;
    public $message;
    public $updatePort;

    public $code, $name, $city_id;

    /** @var Enumerable */
    public $cities;
    public $filtercity;

    public $city = null;

    protected $rules = [
        'code' => 'required',
        'name' => 'required',
        'city_id' => 'required',
    ];

    /**
     * delete action listener
     */
    protected $listeners = [
        'deletePortListner' => 'deletePort',
    ];

    public function mount()
    {
        $this->limit = 30;
        $this->addPort = false;
        $this->updatePort = false;
    }

    public function render()
    {
        $this->ports = Port::query()
            ->limit($this->limit)
            ->with('city')
            ->filter($this->filter)
            ->get();

        $this->cities = City::query()
            ->filterName($this->filtercity)
            ->limit(10)
            ->get();

        if (!is_null($this->city)) {
            $this->cities = $this->cities->concat([$this->city]);
        }

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
            $port = Port::query()->newModelInstance([
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
        $this->updatePort = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->code = '';
        $this->name = '';
        $this->city_id = '';
        $this->city = null;
    }

    public function deletePort($portCode)
    {
        try {
            Port::find($portCode)->delete();
            session()->flash('success', "Post Deleted Successfully!!");
        } catch (Exception $e) {
            session()->flash('error', sprintf("Something goes wrong!! %s", $e->getMessage()));
        }
    }

    public function editPort($portCode)
    {
        try {
            $port = Port::query()->find($portCode);
            if (!$port) {
                session()->flash('error', 'Port not found');
            } else {
                $this->code = $port->code;
                $this->name = $port->name;
                $this->city_id = $port->city_id;
                $this->city = $port->city;
                $this->updatePort = true;
                $this->addPort = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function updatePort()
    {
        $this->validate();
        try {
            $port = Port::query()->find($this->code);

            $port->update([
                'code' => $this->code,
                'name' => $this->name,
                'city_id' => $this->city_id,
            ]);

            session()->flash('success', 'Post Updated Successfully!!');
            $this->resetFields();
            $this->updatePort = false;
        } catch (Exception $ex) {
            session()->flash('success', sprintf('Something goes wrong!! %s', $ex->getMessage()));
        }
    }
}
