@extends('layouts.app')

@section('content')
<script>
    window.items = @json($items);
</script>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Inventory</h2>

            <!-- Search Bar -->
            <div class="mb-3">
                <input type="text" class="form-control" id="searchItem" placeholder="Search for an item...">
            </div>

            <!-- Add Item Button -->
            <div class="mb-3">
                <a href="{{ route('inventory.create') }}" class="btn btn-primary">Add Item</a>
            </div>

            <div class="inventory-list">
                @foreach($items as $item)
                    <div class="inventory-item" data-item-name="{{ $item->name }}">
                        <div class="item-header">
                            {{ $item->name }}
                            <span class="toggle-details">[+]</span>
                        </div>
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
                <div class="not-found-message" style="display: none;">Item not found. Add it to the inventory to use it.</div>
            </div>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchItem');
    const inventoryItems = document.querySelectorAll('.inventory-item');
    const notFoundMessage = document.querySelector('.not-found-message');

    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        let itemsFound = false;

        inventoryItems.forEach(item => {
            const itemName = item.getAttribute('data-item-name').toLowerCase();
            if (itemName.includes(query)) {
                item.style.display = 'block';
                itemsFound = true;
            } else {
                item.style.display = 'none';
            }
        });

        notFoundMessage.style.display = itemsFound ? 'none' : 'block';
    });

    document.querySelectorAll('.inventory-item .item-header').forEach(header => {
        header.addEventListener('click', () => {
            const details = header.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
            header.querySelector('.toggle-details').textContent = details.style.display === 'none' ? '[+]' : '[-]';
        });
    });
</script>
@endsection
