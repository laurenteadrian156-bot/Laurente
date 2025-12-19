<?php

namespace App\Livewire;


use App\Models\Bus;
use Livewire\Component;

class Dashboard extends Component
{
 public $search = '';
    public function delete($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();
        session()->flash('error', 'Successfully Deleted');
    }

    public function render()
    {

        return view('livewire.dashboard', [
            'bus' => Bus::where('location', 'like', '%' . $this->search . '%')->limit(5)->get()
        ]);
    }
}
