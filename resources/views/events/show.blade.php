@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8 col-sm-6">
            <h2>Event Details: {{ $event->name }}</h2>
        </div>
        <div class="col-md-4 col-sm-6 text-md-end text-sm-end text-start">
            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit Event</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $event->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $event->description ?? 'N/A' }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $event->residential_district ?? 'N/A' }}, {{ $event->ward ?? 'N/A' }}, {{ $event->plot ?? 'N/A' }}</p>
            <p class="card-text"><strong>Start:</strong> {{ $event->start_date }} at {{ $event->start_time }}</p>
            <p class="card-text"><strong>End:</strong> {{ $event->end_date }} at {{ $event->end_time }}</p>
            <p class="card-text"><strong>Duration:</strong> {{ \Carbon\Carbon::parse($event->start_timestamp)->diffInHours($event->end_timestamp) }} hours</p>

            @if($event->menu)
                <hr>
                <h6 class="card-subtitle mb-2 text-muted">Assigned Menu: {{ $event->menu->name }}</h6>
                <p class="card-text"><strong>Description:</strong> {{ $event->menu->description ?? 'N/A' }}</p>
                <ul>
                @foreach($event->menu->items as $item) <!-- Assuming each menu has a related 'items' collection -->
                    <li>{{ $item->name }} - {{ $item->price }} Gil</li>
                @endforeach
                </ul>
            @else
                <p class="card-text"><strong>Assigned Menu:</strong> N/A</p>
            @endif
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
    </div>
</div>
@endsection
