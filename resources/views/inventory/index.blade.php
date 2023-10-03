@extends('layouts.app')

@section('content')
<script>
    window.items = @json($items);
</script>
<div class="container mt-5"> <!-- Added top margin for better spacing from the navbar or top of the page -->
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Inventory</h2> <!-- Added margin-bottom for spacing -->

            <!-- Search Bar -->
            <div class="mb-3">
                <input type="text" class="form-control" id="searchItem" placeholder="Search for an item...">
            </div>

            <!-- Add Item Form (Initially hidden) -->
            <div id="addItemForm" style="display: none;">
                <form action="{{ route('inventory.store') }}" method="post">
                    @csrf

                    <!-- Item Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Item Name" required>
                    </div>

                    <!-- Item Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Item Description"></textarea>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                    </div>

                    <!-- Threshold -->
                    <div class="mb-3">
                        <label for="threshold" class="form-label">Threshold</label>
                        <input type="number" class="form-control" id="threshold" name="threshold" placeholder="Threshold" required>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </div>
                </form>
            </div>

            <div class="inventory-list">
                @foreach($items as $item)
                    <div class="inventory-item">
                        <!-- Item Name (Clickable) -->
                        <div class="item-header">
                            {{ $item->name }}
                            <span class="toggle-details">[+]</span>
                        </div>

                        <!-- Item Details (Hidden initially) -->
                        <div class="item-details" style="display: none;">
                            <p><strong>Description:</strong> {{ $item->description }}</p>
                            <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                            <p><strong>Threshold:</strong> {{ $item->threshold }}</p>
                            <p><strong>Price:</strong> {{ number_format($item->price, 0, '.', ',') }} Gil</p>
                            <div>
                                <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle item details visibility
    document.querySelectorAll('.inventory-item .item-header').forEach(header => {
        header.addEventListener('click', () => {
            const details = header.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
            header.querySelector('.toggle-details').textContent = details.style.display === 'none' ? '[+]' : '[-]';
        });
    });
</script>
@endsection
