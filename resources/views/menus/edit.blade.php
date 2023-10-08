@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Edit Menu: {{ $menu->name }}</h1>
        </div>
    </div>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Menu Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $menu->description }}</textarea>
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

        <table class="table table-bordered" id="itemsTable">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Adjustment Type</th>
                    <th>Special Price</th>
                    <th>Discount (%)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menu->items as $item)
                <tr>
                    <td>{{ $item->name }}
                        <!-- Added hidden input for the item's ID -->
                        <input type="hidden" name="items[{{ $item->id }}][id]" value="{{ $item->id }}">
                    </td>
                    <td>
                        <select name="items[{{ $item->id }}][adjustment_type]">
                            <option value="none" {{ $item->pivot->adjustment_type == 'none' ? 'selected' : '' }}>None</option>
                            <option value="special_price" {{ $item->pivot->adjustment_type == 'special_price' ? 'selected' : '' }}>Special Price</option>
                            <option value="discount" {{ $item->pivot->adjustment_type == 'discount' ? 'selected' : '' }}>Discount</option>
                        </select>
                    </td>
                    <td><input type="number" step="0.01" name="items[{{ $item->id }}][special_price]" value="{{ $item->pivot->special_price }}"></td>
                    <td><input type="number" name="items[{{ $item->id }}][discount]" min="0" max="100" value="{{ $item->pivot->discount }}"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-item">Remove</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary mt-3">Update Menu</button>
    </form>
</div>
<script>
  $(document).ready(function() {
    $('#items').change(function() {
        const itemId = $(this).val();
        const itemName = $('option:selected', this).data('name');
        if (itemId) {
            const row = `
                <tr>
                    <td>${itemName}
                        <!-- Added hidden input for the item's ID -->
                        <input type="hidden" name="items[${itemId}][id]" value="${itemId}">
                    </td>
                    <td>
                        <select name="items[${itemId}][adjustment_type]">
                            <option value="none">None</option>
                            <option value="special_price">Special Price</option>
                            <option value="discount">Discount</option>
                        </select>
                    </td>
                    <td><input type="number" step="1" name="items[${itemId}][special_price]"></td>
                    <td><input type="number" name="items[${itemId}][discount]" min="0" max="100"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-item">Remove</button></td>
                </tr>
            `;
            $('#itemsTable tbody').append(row);
        }
    });

    $(document).on('click', '.remove-item', function() {
        $(this).closest('tr').remove();
    });

  });
</script>
@endsection
