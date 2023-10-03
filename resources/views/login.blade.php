@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Login to Your Account</h2>

            <!-- Display Errors -->
            @if($errors->any())
                <div class="alert alert-danger" aria-live="polite"> <!-- Added aria-live for accessibility -->
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
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
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Login</button> <!-- Made the button full width for better mobile UX -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
