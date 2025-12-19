<div>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Bus</h2>
            @if(auth()->user()->isManager())
            <a href="{{ route('buses.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Add New Bus
            </a>
            @endif
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    Bus Location

                                </th>
                                <th>
                                    Max Capacity

                                </th>
                                <th>
                                    Current Occupancy

                                </th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bus as $b)
                            <tr>
                                <td>
                                    <strong>{{ $b->location }}</strong>
                                </td>
                                <td>{{ $b->max_occupants }}</td>
                                <td>{{ $b->current_occupants??'0' }}</td>

                                <td>
                                    @if($b->is_fully_book)
                                    <span class="badge bg-warning">Book</span>
                                    @else
                                    <span class="badge bg-success">Open</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group gap-1" role="group">

                                       
                                        <button type="button"
                                            class="btn btn-sm btn-danger"
                                            wire:confirm="Are you sure you want to delete this resident?"
                                            wire:click="delete({{ $b->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-inbox display-4 text-muted"></i>
                                    <p class="text-muted mt-2">No Bus found</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>


</div>