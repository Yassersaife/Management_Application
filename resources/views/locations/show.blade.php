@extends('master')
@section('title', 'Location Details')
@section('locations_active', 'active bg-light')
@section('content')

    <div class="card">
        <div class=" card-header d-flex justify-content-between align-items-center mb-4">

            <h1>Location Details</h1>
            <a href="{{ route('locations.index') }}" class="btn btn-secondary">Back to Locations</a>
        </div>
        <div class ="card-body">
            <div class="mb-3">
                <lable for="location_id" class="form-label">Location ID</lable>
                <input type="text" class="form-control" id="location_id" value="{{ $location->location_id }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{ $location->name }}" readonly>
            </div>
        </div>
    </div>


@endsection
