@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Create User</h1>
        </div>
    </div>

    <form action="{{ route('management.users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="character_first_name" class="form-label">Character First Name</label>
            <input type="text" class="form-control" id="character_first_name" name="character_first_name" required>
        </div>

        <div class="mb-3">
            <label for="character_last_name" class="form-label">Character Last Name</label>
            <input type="text" class="form-control" id="character_last_name" name="character_last_name" required>
        </div>

        <div class="mb-3">
            <label for="character_server" class="form-label">Server</label>
            <select class="form-control" id="character_server" name="character_server" required>
                @foreach($servers as $server)
                    <option value="{{ $server }}">{{ $server }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection
