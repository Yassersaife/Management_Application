@extends('master')
@section('tittle', 'Add Location');
@section('locations_active', 'active bg-light')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add new Location</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('locations.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="location_id" class="form-label">Location ID (optional)</label>
                    <input type='text' name="location_id" id="location_id"
                        class="form-control 
                    @error('location_id') is-invalid @enderror"
                        value="{{ old('location_id') }}" placeholder="Leave blank for auto-generated ID" />
                    @error('location_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type='text' name="name" id="name"
                        class="form-control
                 @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-evenly mb-3">
                    <a href="{{ route('locations.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Location</button>
                </div>
            </form>
        </div>

    </div>
@endsection
