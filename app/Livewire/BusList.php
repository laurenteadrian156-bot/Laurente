<?php

namespace App\Livewire;

use App\Models\Bus;
use Livewire\Component;

class BusList extends Component
{
    public function delete($id){
        $b=Bus::findOrFail($id);
        $b->delete();
    }
    public function render()
    {
        return view('livewire.bus-list',
    ['bus'=>Bus::all()]);
    }
}
