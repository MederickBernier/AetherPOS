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

    <!-- Collapsible design for medium and smaller devices -->
    <div class="user-list d-lg-none">
        @foreach ($users as $user)
        <div class="user-item">
            <div class="item-header">
                {{ $user->character_first_name }} {{ $user->character_last_name }}
                <span class="toggle-details">[+]</span>
            </div>
            <div class="item-details" style="display: none;">
                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Server:</strong> {{ $user->character_server }}</p>
                <p><strong>Last Active:</strong> {{ $user->last_active ? $user->last_active->diffForHumans() : 'N/A' }}</p>
                <div>
                    <a href="{{ route('management.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('management.users.show', $user->id) }}" class="btn btn-sm btn-success">View</a>
                    <form action="{{ route('management.users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Table design for large devices -->
    <div class="d-none d-lg-block">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Server</th>
                    <th>Last Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->character_first_name }}</td>
                    <td>{{ $user->character_last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->character_server }}</td>
                    <td>{{ $user->last_active ? $user->last_active->diffForHumans() : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('management.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('management.users.show', $user->id) }}" class="btn btn-sm btn-success">View</a>
                        <form action="{{ route('management.users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
