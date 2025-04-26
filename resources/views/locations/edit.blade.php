@extends('master');
@section('title', 'Edit Location')
@section('locations_active', 'active bg-light')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Edit Location</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('locations.update', $location) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="location_id" class="from-label">Location ID</label>
                    <input type="text" class ="form-control @error('location_id') is-invalid @enderror" id="location_id"
                        value="{{ $location->location_id }}" name="location_id" readonly>
                    @error('location_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                </div>

                <div class ="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is_invalid @enderror" id="name"
                        name="name" value="{{ old('name', $location->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="d-flex justify-content-evenly my-2">
                    <a href="{{ route('locations.index') }}" class=" btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Location</button>
                </div>
            </form>
        </div>
    </div>


@endsection
