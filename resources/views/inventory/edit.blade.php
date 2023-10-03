@extends('layouts.app')

@section('content')
<div class="container mt-5"> <!-- Added top margin for better spacing from the navbar or top of the page -->
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Edit Item</h2> <!-- Added margin-bottom for spacing -->

            <form action="{{ route('inventory.update', $item) }}" method="post">
                @csrf
                @method('PUT')

                <!-- Item Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}" required>
                </div>

                <!-- Item Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $item->description) }}</textarea>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}" required>
                </div>

                <!-- Threshold -->
                <div class="mb-3">
                    <label for="threshold" class="form-label">Threshold</label>
                    <input type="number" class="form-control" id="threshold" name="threshold" value="{{ old('threshold', $item->threshold) }}" required>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $item->price) }}" required>
                </div>

                <!-- Buttons Container -->
                <div class="d-flex justify-content-start mb-3">
                    <!-- Save Button -->
                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                </form>

                <!-- Delete Button -->
                <form action="{{ route('inventory.destroy', $item) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Item</button>
                </form>
                </div>
        </div>
    </div>
</div>
@endsection
