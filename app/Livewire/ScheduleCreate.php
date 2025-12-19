<?php

namespace App\Livewire;

use App\Models\Bus;
use App\Models\Schedule;
use Livewire\Component;

class ScheduleCreate extends Component
{

    public Schedule $schedule;

    protected function rules()
    {

        return [
            'schedule.seat_number' => 'required|string',
            'schedule.bus_id' => 'required|string',
        ];
    }


    public function mount($bus_id = null)
    {
        $this->schedule = new Schedule();
        if ($bus_id) {
            $this->schedule->bus_id = $bus_id;
        }
    }

    public function isFull()
    {
        $bus = Bus::findOrFail($this->schedule->bus_id);


        if ($bus->is_fully_book) {
            return true;
        }
        return false;
    }
    public function save()
    {

        $this->validate();
        try {
            if ($this->isFull()) {
                session()->flash('error', 'Fully Book');
                return redirect()->route('schedules.index');
            }
            $this->schedule->user_id = auth()->id();
            $this->schedule->save();

            session()->flash('success', 'Created successfully!');
            return redirect()->route('schedules.index');
        } catch (\Throwable $th) {
            $this->addError('general', 'Something went wrong.');
        }
    }


    public function render()
    {
        return view('livewire.schedule-create', [

            'bus' => Bus::all()
        ]);
    }
}
