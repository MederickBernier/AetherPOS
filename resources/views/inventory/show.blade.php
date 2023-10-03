@extends('layouts.app')

@section('content')
<div class="container mt-5"> <!-- Added top margin for better spacing from the navbar or top of the page -->
    <h2 class="mb-4">View Item Details</h2> <!-- Added margin-bottom for spacing -->

    <!-- Item Name -->
    <div class="mb-3">
        <strong>Name:</strong> {{ $item->name }}
    </div>

    <!-- Item Description -->
    <div class="mb-3">
        <strong>Description:</strong> {{ $item->description }}
    </div>

    <!-- Quantity -->
    <div class="mb-3">
        <strong>Quantity:</strong> {{ $item->quantity }}
    </div>

    <!-- Threshold -->
    <div class="mb-3">
        <strong>Threshold:</strong> {{ $item->threshold }}
    </div>

    <!-- Price -->
    <div class="mb-3">
        <strong>Price:</strong> {{ number_format($item->price, 0, '.', ',') }} Gil
    </div>

    <!-- Back Button -->
    <a href="{{ route('inventory.index') }}" class="btn btn-primary mt-3">Back to Inventory</a> <!-- Added margin-top for spacing -->
</div>
@endsection
