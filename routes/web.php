<?php

use App\Livewire\BusCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Livewire\ApplicationCreateForm;
use App\Livewire\ApplicationList;
use App\Livewire\BusList;
use App\Livewire\Dashboard;
use App\Livewire\RoomCreateForm;
use App\Livewire\RoomEditForm;
use App\Livewire\RoomList;
use App\Livewire\RoomShow;
use App\Livewire\ScheduleCreate;
use App\Livewire\ScheduleList;
use App\Livewire\StudentCreateForm;
use App\Livewire\StudentEditForm;
use App\Livewire\StudentList;
use App\Models\Bus;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashboard');



    Route::get('/buses', BusList::class)->name('buses.index');
    Route::get('/buses/create', BusCreate::class)->name('buses.create');


    Route::get('/schedules', ScheduleList::class)->name('schedules.index');
   Route::get('/schedules/create/{bus_id?}', ScheduleCreate::class)->name('schedules.create');

});
