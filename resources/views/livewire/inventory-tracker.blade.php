<div wire:poll.5s="getLowStockItems">
    {{-- <div class="progress" style="height: 5px; margin-bottom:2px;">
        <div class="progress-bar" role="progressbar" style="width: {{ $progressValue }}%;" aria-valuenow="{{ $progressValue }}" aria-valuemin="0" aria-valuemax="100"></div>
    </div> --}}
    @if($lowStockItems->isEmpty())
        <p>All items are above their threshold.</p>
    @else
        <ul class="list-group list-group-flush">
            @foreach($lowStockItems as $item)
                <li class="list-group-item">
                    <a href="{{ route('inventory.edit', $item->id) }}">{{ $item->name }}</a>
                    <span class="badge bg-warning text-dark float-end">{{ $item->difference }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
