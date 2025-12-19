<div>
    <div class="container-fluid py-4">

        <div class="mb-4">
            <h2 class="mb-1">CatIsland Overview</h2>
            <div class="text-muted small">
                <i class="bi bi-person-circle me-1"></i>
                {{ auth()->user()->name }}
                <span class="mx-2">•</span>
                {{ now()->format('F d, Y') }}
                <span class="mx-2">•</span>
                {{ now()->format('h:i A') }}
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <label class="form-label mb-1">Search Bus Location</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Type bus location..."
                    wire:model.live="search"
                >
            </div>
        </div>

        <div class="card border-0 shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Bus Location</th>
                                <th>Current Occupants</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bus as $b)
                               <tr style="cursor:pointer" onclick="window.location='{{ route('schedules.create', ['bus_id' => $b->id]) }}'">
                                    <td>
                                        <strong>{{ $b->location }}</strong>
                                    </td>
                                    <td>
                                        {{ $b->schedule->count() ?? '0' }}
                                    </td>
                                    <td>
                                        @if($b->is_fully_book)
                                    <span class="badge bg-warning">Book</span>
                                    @else
                                    <span class="badge bg-success">Open</span>
                                    @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5">
                                        <i class="bi bi-inbox display-4 text-muted"></i>
                                        <p class="text-muted mt-2 mb-0">No buses found</p>
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
