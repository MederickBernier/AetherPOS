@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Edit Profile</h2>
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="characterFirstName" class="form-label">Character First Name</label>
                    <input type="text" class="form-control" id="characterFirstName" name="character_first_name" value="{{ auth()->user()->character_first_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="characterLastName" class="form-label">Character Last Name</label>
                    <input type="text" class="form-control" id="characterLastName" name="character_last_name" value="{{ auth()->user()->character_last_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep the same"> <!-- Updated placeholder -->
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Update Profile</button> <!-- Made the button full width for better mobile UX -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
