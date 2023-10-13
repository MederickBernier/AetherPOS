@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Password Recovery</h2>

            <!-- Return to main page link -->
            <div class="text-center mb-3">
                <a href="{{ route('home') }}" class="text-decoration-none">Return to main page</a>
            </div>

            <form action="{{ route('recovery.verify') }}" method="post">
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
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Verify Details</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
