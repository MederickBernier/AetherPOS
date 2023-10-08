@extends('layouts.app')

@section('content')
<script>
    window.transactions = @json($transactions);
</script>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Transactions</h2>

            <!-- Search Bar (optional) -->
            <div class="mb-3">
                <input type="text" class="form-control" id="searchTransaction" placeholder="Search for a transaction...">
            </div>

            <div class="transaction-list">
                @foreach($transactions as $transaction)
                    <div class="transaction-item">
                        <div class="transaction-header">
                            Transaction ID: {{ $transaction->id }}
                            <span class="toggle-details">[+]</span>
                        </div>
                        <div class="transaction-details" style="display: none;">
                            <p><strong>User:</strong> {{ $transaction->user->character_first_name }} {{ $transaction->user->character_last_name }}</p>
                            <p><strong>Total Amount:</strong> {{ number_format($transaction->total_amount, 0, '.', ',') }} Gil</p>
                            @if($transaction->event)
                                <p><strong>Event:</strong> {{ $transaction->event->name }}</p>
                            @endif
                            <p><a href="{{ route('transactions.cancel', $transaction) }}" class="btn btn-danger btn-sm float-right ml-2">Cancel</a></p>
                            <p><strong>Items:</strong></p>
                            <ul>
                                @foreach($transaction->items as $item)
                                    <li>{{ $item->name }} (Quantity: {{ $item->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.transaction-item .transaction-header').forEach(header => {
        header.addEventListener('click', () => {
            const details = header.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
            header.querySelector('.toggle-details').textContent = details.style.display === 'none' ? '[+]' : '[-]';
        });
    });
</script>
@endsection
