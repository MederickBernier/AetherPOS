@extends('layouts.app')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Create New Menu</h1>
        </div>
    </div>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Menu Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="items" class="form-label">Add Item</label>
            <select class="form-control" id="items">
                <option value="">-- Select an Item --</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" data-name="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Headers for medium and large devices -->
        <div class="row border d-none d-md-flex mb-2">
            <div class="col-md-3 py-2">Item Name</div>
            <div class="col-md-3 py-2">Adjustment Type</div>
            <div class="col-md-3 py-2">Value</div>
            <div class="col-md-3 py-2 text-end">Actions</div>
        </div>

        <div id="itemsContainer">
            <!-- Rows will be added dynamically here -->
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Menu</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        let selectedItems = [];

        $('#items').change(function() {
            const itemId = $(this).val();
            const itemName = $('option:selected', this).data('name');
            if (itemId) {
                const itemData = {
                    id: itemId,
                    name: itemName,
                    adjustment_type: 'none',
                    special_price: null,
                    discount: null
                };
                selectedItems.push(itemData);
                renderItems();
            }
        });

        function renderItems() {
            $('#itemsContainer').empty();
            selectedItems.forEach((item, index) => {
                const row = `
                    <div class="row border mb-2" data-index="${index}">
                        <div class="col-12 col-md-3 py-2">${item.name}<input type="hidden" name="items[${index}][id]" value="${item.id}"></div>
                        <div class="col-12 col-md-3 py-2">
                            <select class="adjustment-type form-control" name="items[${index}][adjustment_type]">
                                <option value="none">None</option>
                                <option value="special_price">Special Price</option>
                                <option value="discount">Discount</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3 py-2 adjustment-value"></div>
                        <div class="col-12 col-md-3 py-2 text-end">
                            <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                        </div>
                    </div>
                `;
                $('#itemsContainer').append(row);
            });
        }

        $(document).on('change', '.adjustment-type', function() {
            const adjustmentType = $(this).val();
            const parentRow = $(this).closest('.row');
            const index = parentRow.data('index');
            selectedItems[index].adjustment_type = adjustmentType;

            let inputField = '';
            if (adjustmentType === 'special_price') {
                inputField = `<input type="number" step="1" class="form-control" name="items[${index}][special_price]">`;
            } else if (adjustmentType === 'discount') {
                inputField = `<input type="number" class="form-control" name="items[${index}][discount]" min="0" max="100">`;
            }
            parentRow.find('.adjustment-value').html(inputField);
        });

        $(document).on('click', '.remove-item', function() {
            const parentRow = $(this).closest('.row');
            const index = parentRow.data('index');
            selectedItems.splice(index, 1);
            renderItems();
        });
    });
</script>
@endsection
