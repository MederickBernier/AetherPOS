@extends('layouts.app')

@section('content')
    <div class="container mt-5"> <!-- Added top margin for better spacing from the navbar or top of the page -->
        <h1 class="mb-4">Create New Item</h1> <!-- Added margin-bottom for spacing -->
        <form action="{{ route('inventory.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea> <!-- Added rows attribute for a consistent initial height -->
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required min="0">
            </div>
            <div class="mb-3">
                <label for="threshold" class="form-label">Threshold</label>
                <input type="number" class="form-control" id="threshold" name="threshold" required min="0">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required min="0">
            </div>
            <button type="submit" class="btn btn-primary w-100">Create Item</button> <!-- Made the button full width for better mobile UX -->
        </form>
    </div>
@endsection
