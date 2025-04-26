<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body>
    @include('partials.header')


    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
        <div class="flex mt-2 justify-content-center">
            @include('partials.footer')

        </div>

        @include('partials.scripts')

</body>

</html>
