@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Create a New Account</h2>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="characterFirstName" class="form-label">Character First Name</label>
                    <input type="text" class="form-control" id="characterFirstName" name="characterFirstName" required>
                </div>
                <div class="mb-3">
                    <label for="characterLastName" class="form-label">Character Last Name</label>
                    <input type="text" class="form-control" id="characterLastName" name="characterLastName" required>
                </div>
                <div class="mb-3">
                    <label for="characterServer" class="form-label">Character Server</label>
                    <select class="form-control select2" id="characterServer" name="characterServer" required>
                        <!-- Placeholder for server names. This will be populated from the controller -->
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
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Register</button> <!-- Made the button full width for better mobile UX -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
