<div>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Booking</h2>
            @if(auth()->user()->isManager())
            <a href="{{ route('schedules.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Add New Booking
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
                                    Seat Number

                                </th>
                                <th>Book by</th>
                                <th>Bus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($schedules as $sc)
                            <tr>
                                <td>
                                    <strong>{{ $sc->seat_number }}</strong>
                                </td>
                                <td>{{ $sc->user->name }}</td>
                                <td>{{ $sc->bus->location }}</td>

                                
                                <td>
                                    <div class="btn-group gap-1" role="group">

                                       
                                        <button type="button"
                                            class="btn btn-sm btn-danger"
                                            wire:confirm="Are you sure you want to delete this resident?"
                                            wire:click="delete({{ $sc->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-inbox display-4 text-muted"></i>
                                    <p class="text-muted mt-2">No Record found</p>
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