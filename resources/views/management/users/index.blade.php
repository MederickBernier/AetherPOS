@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Manage Users</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('management.users.create') }}" class="btn btn-primary">Create User</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Server</th>
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
@endsection
