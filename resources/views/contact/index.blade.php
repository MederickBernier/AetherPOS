@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1>Contact Us</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>

        <!-- reCAPTCHA widget -->
        <div class="mb-3">
            <div class="g-recaptcha" data-sitekey="6LcaDYooAAAAAHYt66L5AippkQs8jokAYWbS3DqB"></div>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>

<!-- Include reCAPTCHA JavaScript -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
