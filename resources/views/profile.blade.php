@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Edit Profile</h2>
            <form action="{{ route('profile.update') }}" method="post" id="profileForm">
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
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep the same">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');

    function checkPasswordMatch() {
        if (password.value && passwordConfirmation.value) {
            if (password.value === passwordConfirmation.value) {
                password.classList.remove('is-invalid');
                passwordConfirmation.classList.remove('is-invalid');
                password.classList.add('is-valid');
                passwordConfirmation.classList.add('is-valid');
            } else {
                password.classList.remove('is-valid');
                passwordConfirmation.classList.remove('is-valid');
                password.classList.add('is-invalid');
                passwordConfirmation.classList.add('is-invalid');
            }
        } else {
            password.classList.remove('is-valid', 'is-invalid');
            passwordConfirmation.classList.remove('is-valid', 'is-invalid');
        }
    }

    password.addEventListener('input', checkPasswordMatch);
    passwordConfirmation.addEventListener('input', checkPasswordMatch);
</script>

@endsection
