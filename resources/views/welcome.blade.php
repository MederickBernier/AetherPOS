@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="hero-section">
        <h1>Welcome to AetherPOS</h1>
        <p class="lead">Unleash the power of Eorzea's premier point-of-sale system for Free Companies.</p>
        @guest
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        {{-- <a href="{{ route('register') }}" class="btn btn-secondary">Register</a> --}}
        @endguest
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="feature-box">
                <div class="feature-icon text-primary bg-white">
                    <i class="bi bi-cash"></i>
                </div>
                <h3>Efficient POS System</h3>
                <p>Streamline your sales process with our intuitive and efficient point-of-sale system.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <div class="feature-icon text-success">
                    <i class="bi bi-box"></i>
                </div>
                <h3>Inventory Management</h3>
                <p>Keep track of your stock and ensure you never run out of your best-selling items.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <div class="feature-icon text-warning">
                    <i class="bi bi-calendar-event"></i>
                </div>
                <h3>Event Management</h3>
                <p>Organize and manage events seamlessly with special pricing and discounts.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .hero-section {
        padding: 150px 0;
        text-align: center;
    }

    .feature-box {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        transition: transform 0.3s;
    }

    .feature-box:hover {
        transform: translateY(-10px);
    }

    .feature-icon {
        font-size: 40px;
        margin-bottom: 20px;
    }
</style>
@endsection
