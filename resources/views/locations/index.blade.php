@extends('master')
@section('title', 'Locations')
@section('Location_active', 'active bg-light')

@section('content')
    <div class=' d-flex justify-content-between my-2 align-items-center'>
        <h1>Locations</h1>
        <a href="{{ route('locations.create') }}" class="btn btn-primary">Add New Location</a>
    </div>
    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Location</th>
                        <th>Location Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <th> {{ $location->location_id }}</th>
                            <th>{{ $location->name }}</th>
                            <th>
                                <a href="{{ route('locations.show', $location) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('locations.edit', $location) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('locations.destroy', $location) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this location?')">Delete</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>


@endsection
