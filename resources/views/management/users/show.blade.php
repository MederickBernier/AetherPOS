@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>User Profile</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Character Information</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>First Name:</strong> {{ $user->character_first_name }}</li>
                <li class="list-group-item"><strong>Last Name:</strong> {{ $user->character_last_name }}</li>
                <li class="list-group-item"><strong>Server:</strong> {{ $user->character_server }}</li>
            </ul>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Contact Information</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
            </ul>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('management.users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
    </div>
</div>
@endsection
