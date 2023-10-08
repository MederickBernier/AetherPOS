<div wire:poll.60s="fetchTotalSales">
    @if($totalSales > 0)
        <div class="alert alert-info">
            <h5 class="mb-2">Current Event Sales</h5>
            <p class="mb-0">Total Sales: {{ number_format($totalSales, 0, '.', ',') }} Gil</p>
        </div>
    @endif
</div>
