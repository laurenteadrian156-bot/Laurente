<?php

namespace App\Livewire;

use App\Models\Bus;
use App\Models\Schedule;
use Livewire\Component;

class ScheduleList extends Component
{

    
    public function delete($id)
    {
        $sc = Schedule::findOrFail($id);
        $sc->delete();
        session()->flash('error', 'Successfully Deleted');
    }

    public function render()
    {
        return view('livewire.schedule-list',
        ['schedules'=>Schedule::all()]
    );
    }
}
