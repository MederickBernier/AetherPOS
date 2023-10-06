<div wire:poll.60s="getActiveUsers">
    <h5>Active Users:</h5>
    @if($activeUsers->isEmpty())
        <p>No active users right now.</p>
    @else
        <ul class="list-group list-group-flush">
            @foreach($activeUsers as $user)
                <li class="list-group-item">
                    {{ $user->character_first_name }} {{ $user->character_last_name }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
