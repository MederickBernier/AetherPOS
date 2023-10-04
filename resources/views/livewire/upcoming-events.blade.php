<div wire:poll.60s>
    @foreach($events as $event)
        @php
            $now = \Carbon\Carbon::now();
            $startDateTime = \Carbon\Carbon::parse("{$event->start_date} {$event->start_time}");
            $endDateTime = \Carbon\Carbon::parse("{$event->end_date} {$event->end_time}");

            $isActive = $now->between($startDateTime, $endDateTime);
            $timeDiffForStart = $now->diffForHumans($startDateTime, [
                'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
            ]);
            $timeRemaining = $now->diffForHumans($endDateTime, [
                'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
            ]);
        @endphp

        @if($isActive)
            <div>
                <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a> - Ends in {{ $timeRemaining }}
            </div>
        @else
            <div>
                <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a> - Starts in {{ $timeDiffForStart }}
            </div>
        @endif
    @endforeach
</div>
