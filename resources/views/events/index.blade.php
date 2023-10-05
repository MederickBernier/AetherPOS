@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8 col-sm-6">
            <h2>Events</h2>
        </div>
        <div class="col-md-4 col-sm-6 text-md-end text-sm-end text-start">
            <a href="{{ route('events.create') }}" class="btn btn-primary">Create New Event</a>
        </div>
    </div>

    <div class="event-list">
        @if($events->count())
            @foreach($events as $event)
                <div class="event-item">
                    <!-- Event Name (Clickable) -->
                    <div class="item-header">
                        {{ $event->name }}
                        <span class="toggle-details">[+]</span>
                    </div>

                    <!-- Event Details (Hidden initially) -->
                    <div class="item-details" style="display: none;">
                        <p><strong>ID:</strong> {{ $event->id }}</p>
                        <p><strong>Description:</strong> {{ $event->description ?? 'N/A' }}</p>
                        <p><strong>Location:</strong> {{ $event->residential_district ?? 'N/A' }}, W{{ $event->ward ?? 'N/A' }}, P{{ $event->plot ?? 'N/A' }}</p>
                        <p><strong>Assigned Menu:</strong> {{ optional($event->menu)->name ?? 'N/A' }}</p>
                        <p><strong>Start:</strong> {{ $event->start_date }} at {{ $event->start_time }}</p>
                        <p><strong>End:</strong> {{ $event->end_date }} at {{ $event->end_time }}</p>
                        <p><strong>Duration:</strong> {{ \Carbon\Carbon::parse($event->start_timestamp)->diffInHours($event->end_timestamp, ['short' => true]) }} Hours</p>
                        <div>
                            <a href="{{ route('events.show', $event) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="event-item">
                <div class="item-header">
                    No events found in the database.
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    // Toggle event details visibility
    document.querySelectorAll('.event-item .item-header').forEach(header => {
        header.addEventListener('click', () => {
            const details = header.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
            header.querySelector('.toggle-details').textContent = details.style.display === 'none' ? '[+]' : '[-]';
        });
    });
</script>
@endsection
