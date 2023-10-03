@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Menu Details: {{ $menu->name }}</h1>
        </div>
    </div>

    <div class="mb-3">
        <h2 class="mb-4">Menu Information</h2>
        <dl class="row">
            <dt class="col-sm-3">Menu Name:</dt>
            <dd class="col-sm-9">{{ $menu->name }}</dd>

            <dt class="col-sm-3">Description:</dt>
            <dd class="col-sm-9">{{ $menu->description }}</dd>
        </dl>
    </div>

    <h2 class="mt-5">Menu Items</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Adjustment Type</th>
                <th>Special Price</th>
                <th>Discount (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu->items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->pivot->adjustment_type }}</td>
                <td>{{ $item->pivot->special_price }}</td>
                <td>{{ $item->pivot->discount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('menus.index') }}" class="btn btn-primary">Back to Menu List</a>
</div>
@endsection
