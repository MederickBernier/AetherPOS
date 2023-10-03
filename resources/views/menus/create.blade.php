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
        $('#items').change(function() {
            const itemId = $(this).val();
            const itemName = $('option:selected', this).data('name');
            if (itemId) {
                const row = `
                    <div class="row border mb-2">
                        <div class="col-12 col-md-3 py-2">${itemName}<input type="hidden" name="items[]" value="${itemId}"></div>
                        <div class="col-12 col-md-3 py-2">
                            <select class="adjustment-type form-control" name="adjustment_type[]">
                                <option value="none">None</option>
                                <option value="special_price">Special Price</option>
                                <option value="discount">Discount</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3 py-2 text-end">
                            <button type="button" class="btn btn-danger btn-sm remove-item">Remove</button>
                        </div>
                    </div>
                `;
                $('#itemsContainer').append(row);
            }
        });

        $(document).on('change', '.adjustment-type', function() {
            const adjustmentType = $(this).val();
            const parentRow = $(this).closest('.row');

            // Remove existing dynamic columns if any
            parentRow.find('.dynamic-column').remove();

            if (adjustmentType === 'special_price') {
                const specialPriceColumn = `
                    <div class="col-12 col-md-3 py-2 dynamic-column">
                        <input type="number" step="1" class="form-control" name="special_price[]">
                    </div>
                `;
                parentRow.find('.text-end').before(specialPriceColumn);
            } else if (adjustmentType === 'discount') {
                const discountColumn = `
                    <div class="col-12 col-md-3 py-2 dynamic-column">
                        <input type="number" class="form-control" name="discount[]" min="0" max="100">
                    </div>
                `;
                parentRow.find('.text-end').before(discountColumn);
            }
        });

        $(document).on('click', '.remove-item', function() {
            $(this).closest('.row').remove();
        });
    });
</script>
@endsection
