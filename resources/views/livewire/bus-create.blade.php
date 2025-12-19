<div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create New Bus</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="save">
                            <div class="mb-3">
                                <label for="name" class="form-label">Bus Distination <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control " 
                                       wire:model="bus.location" 
                                      >
                                @error('bus.location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="max_occupants" class="form-label">Maximum Occupancy<span class="text-danger">*</span></label>
                                <input type="number" 
                                       class="form-control" 
                                       id="max_occupants" 
                                       wire:model="bus.max_occupants" 
                                       placeholder="Enter maximum number of students"
                                       min="1"
                                       >
                                @error('bus.max_occupants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                          

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('buses.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary"
                                wire:click="save">
                                    <i class="bi bi-save me-2"></i>Create Bus
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
