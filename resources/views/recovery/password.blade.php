@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Password Recovery</h2>

            <!-- Display Errors -->
            @if($errors->any())
                <div class="alert alert-danger" aria-live="polite">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('recovery.update') }}" method="post" id="recoveryForm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for live password confirmation -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const form = document.getElementById('recoveryForm');

        function checkPasswordMatch() {
            if (password.value && confirmPassword.value) {
                if (password.value !== confirmPassword.value) {
                    password.style.borderColor = 'red';
                    confirmPassword.style.borderColor = 'red';
                } else {
                    password.style.borderColor = 'green';
                    confirmPassword.style.borderColor = 'green';
                }
            } else {
                password.style.borderColor = '';
                confirmPassword.style.borderColor = '';
            }
        }

        password.addEventListener('input', checkPasswordMatch);
        confirmPassword.addEventListener('input', checkPasswordMatch);
    });
</script>
@endsection
