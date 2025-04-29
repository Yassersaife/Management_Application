<nav class="navbar  navbar-expand-lg  navbar  shadow-sm mb-3">

    <div class="container ">

        <a class="navbar-brand" href="{{ route('dashboard') }}">Inventory Management</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> <span
                class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse  navbar-collapse  mx-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link @yield('products_active')" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link @yield('Location_active')" href="{{ route('locations.index') }}">Locations</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link @yield('movements_active')" href="{{ route('movements.index') }}">Product Movements</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link @yield('report_active')" href="{{ route('report') }}">Report</a>
                </li>

            </ul>

        </div>
    </div>


</nav>
