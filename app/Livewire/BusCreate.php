<?php

namespace App\Livewire;

use App\Models\Bus;
use Livewire\Component;

class BusCreate extends Component
{
    public Bus $bus;

    public function rules(){
        return [
            'bus.max_occupants'=>'required|int',
            'bus.location'=>'required|string',
        ];
    }

    public function mount(){
        $this->bus= new Bus();

    }

    public function save(){
        try {
        $this->validate();
            $this->bus->save();
               session()->flash('success', 'Created successfully!');
            return redirect()->route('buses.index');
        } catch (\Throwable $th) {
                $this->addError('general', 'Something went wrong.'.$th->getMessage());

        }
    }
    public function render()
    {
        return view('livewire.bus-create');
    }
}
