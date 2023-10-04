@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1>Dashboard</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">

        <!-- Card 1 -->
        <div class="col">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Events Tracker
                </div>
                <div class="card-body">
                    <livewire:upcoming-events/>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col hidden">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Card Title 2
                </div>
                <div class="card-body">
                    Card content 2
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col hidden">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Card Title 3
                </div>
                <div class="card-body">
                    Card content 3
                </div>
            </div>
        </div>

        <!-- Inventory Tracker -->
        <div class="col">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Inventory Tracker
                </div>
                <div class="card-body">
                    <livewire:inventory-tracker />
                </div>
            </div>
        </div>


        <!-- Card 5 -->
        <div class="col hidden">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Card Title 5
                </div>
                <div class="card-body">
                    Card content 5
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col hidden">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Card Title 6
                </div>
                <div class="card-body">
                    Card content 6
                </div>
            </div>
        </div>

        <!-- Card 7 -->
        <div class="col hidden">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Card Title 7
                </div>
                <div class="card-body">
                    Card content 7
                </div>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="col">
            <div class="card h-100 overflow-auto">
                <div class="card-header">
                    Developper's Todo List
                </div>
                <div class="card-body">
                    <ul>
                        <li>Menu modifications not available</li>
                        <li>Event Module to create</li>
                        <li>Point of Sale Module to create</li>
                        <li>Accounting Module to create</li>
                        <li>Work the design to be more responsive on small and medium devices.</li>
                        <li>Adding a theme switcher, for now we'll run with the light one until i figure out how to do it without breaking everything</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
