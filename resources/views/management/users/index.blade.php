@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8 col-sm-6">
            <h2>Manage Users</h2>
        </div>
        <div class="col-md-4 col-sm-6 text-md-end text-sm-end text-start">
            <a href="{{ route('management.users.create') }}" class="btn btn-primary">Create User</a>
        </div>
    </div>

    <div class="user-list">
        @if($users->count())
            @foreach($users as $user)
                <div class="user-item mb-3">
                    <!-- User Name (Clickable) -->
                    <div class="item-header">
                        {{ $user->character_first_name }} {{ $user->character_last_name }}
                        <span class="toggle-details">[+]</span>
                    </div>

                    <!-- User Details (Hidden initially) -->
                    <div class="item-details" style="display: none;">
                        <p><strong>ID:</strong> {{ $user->id }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Server:</strong> {{ $user->character_server }}</p>
                        <p><strong>Last Active:</strong> {{ $user->last_active ? $user->last_active->diffForHumans() : 'N/A' }}</p>
                        <div>
                            <a href="{{ route('management.users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('management.users.show', $user->id) }}" class="btn btn-success btn-sm">View</a>
                            <form action="{{ route('management.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="user-item">
                <div class="item-header">
                    No users found in the database.
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    // Toggle user details visibility
    document.querySelectorAll('.user-item .item-header').forEach(header => {
        header.addEventListener('click', () => {
            const details = header.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
            header.querySelector('.toggle-details').textContent = details.style.display === 'none' ? '[+]' : '[-]';
        });
    });
</script>
@endsection
