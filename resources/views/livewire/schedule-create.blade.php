<div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create New Booking</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="save">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for=""></label>
                                    <select class="form-select" name="" id="" wire:model.live="schedule.bus_id">
                                        <option selected>Select one</option>
                                        @foreach($bus as $b)

                                        <option value="{{ $b->id }}">{{ $b->location }}</option>
                                        @endforeach
                                        @error('schedule.bus_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </select>

                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text"
                                    class="form-control"
                                    id="seat_number"
                                    wire:model="schedule.seat_number"
                                    placeholder="Enter Set Number">
                                @error('schedule.seat_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="d-flex justify-content-between">
                                <a href="{{ route('schedules.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary"
                                    wire:click="save">
                                    <i class="bi bi-save me-2"></i>Create Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>