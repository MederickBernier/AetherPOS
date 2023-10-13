<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid d-flex align-items-center">
        <!-- Logo and App Name -->
        <a class="navbar-brand" href="{{ auth()->check() ? route('dashboard.index') : route('home') }}">
            <i width="32" height="32" class="bi bi-chevron-double-right d-inline-block align-text-top me-3"></i>
            AetherPOS
        </a>

        <!-- Navbar Toggler for smaller screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
            <!-- Inventory Dropdown -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInventory" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Inventory
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownInventory">
                        <li><a class="dropdown-item" href="{{ route('inventory.index') }}">Inventory</a></li>
                        <li><a class="dropdown-item" href="{{ route('inventory.create') }}">Add a new item</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenus" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menus
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenus">
                        <li><a class="dropdown-item" href="{{ route('menus.index') }}">List of all Menus</a></li>
                        <li><a class="dropdown-item" href="{{ route('menus.create') }}">Add a new Menu</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEvents" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Events
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownEvents">
                        <li><a class="dropdown-item" href="{{ route('events.index') }}">List of all Events</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.create') }}">Add a new Event</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pos.index') }}">Point of Sale</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Accounting</a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownManagement" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownManagement">
                        <li><a class="dropdown-item" href="{{ route('management.users.index') }}">List of all Users</a></li>
                        <li><a class="dropdown-item" href="{{ route('management.users.create') }}">Add a new User</a></li>
                        <li><a class="dropdown-item" href="{{ route('transactions.index') }}">View all transactions</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('help.index') }}">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                </li>

            </ul>
            @endauth

            <!-- Right side: Login, Register, or Greeting and Logout based on authentication status -->
            <div class="d-flex ms-auto align-items-center">
                @guest
                    <a href="{{ route('login.show') }}" class="text-white me-4 text-decoration-none">Login</a>
                @endguest

                @auth
                <span class="text-white me-4"><a href="{{ route('profile') }}" style="color: inherit; text-decoration: none;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Go to Profile">Hi, {{ Auth::user()->character_first_name }} !</a></span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none py-2">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
