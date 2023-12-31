@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Edit Event</h1>
        </div>
    </div>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="residential_district" class="form-label">Residential District</label>
            <select class="form-control" id="residential_district" name="residential_district">
                <option value="">-- Select a District --</option>
                @foreach($districts as $district)
                    <option value="{{ $district }}" {{ $event->residential_district == $district ? 'selected' : '' }}>{{ $district }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ward" class="form-label">Ward</label>
                <input type="text" class="form-control" id="ward" name="ward" value="{{ $event->ward }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="plot" class="form-label">Plot</label>
                <input type="text" class="form-control" id="plot" name="plot" value="{{ $event->plot }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="menu_id" class="form-label">Assigned Menu</label>
            <select class="form-control" id="menu_id" name="menu_id">
                <option value="">-- Select a Menu --</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" {{ $event->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $event->start_date }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $event->start_time }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $event->end_date }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $event->end_time }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Event</button>
    </form>
</div>
@endsection
