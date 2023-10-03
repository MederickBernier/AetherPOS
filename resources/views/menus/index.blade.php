@extends('layouts.app')

@section('content')
<div class="container mt-5"> <!-- Added top margin for better spacing from the navbar or top of the page -->
    <div class="row mb-4">
        <div class="col-md-8 col-sm-6">
            <h2>Menus</h2>
        </div>
        <div class="col-md-4 col-sm-6 text-md-end text-sm-end text-start"> <!-- Responsive alignment for the button -->
            <a href="{{ route('menus.create') }}" class="btn btn-primary">Create New Menu</a>
        </div>
    </div>

    <div class="menu-list">
        @if($menus->count())
            @foreach($menus as $menu)
                <div class="menu-item">
                    <!-- Menu Name (Clickable) -->
                    <div class="item-header">
                        {{ $menu->name }}
                        <span class="toggle-details">[+]</span>
                    </div>

                    <!-- Menu Details (Hidden initially) -->
                    <div class="item-details" style="display: none;">
                        <p><strong>ID:</strong> {{ $menu->id }}</p>
                        <p><strong>Description:</strong> {{ $menu->description }}</p>
                        <div>
                            <a href="{{ route('menus.show', $menu) }}" class="btn btn-info btn-sm">View</a>
                            <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this menu?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="menu-item">
                <div class="item-header">
                    No menus found in the database.
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    // Toggle menu details visibility
    document.querySelectorAll('.menu-item .item-header').forEach(header => {
        header.addEventListener('click', () => {
            const details = header.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
            header.querySelector('.toggle-details').textContent = details.style.display === 'none' ? '[+]' : '[-]';
        });
    });
</script>
@endsection
