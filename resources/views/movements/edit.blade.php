@extends('master')
@section('title', 'Edit Movement')
@section('movements_active', 'active bg-light')

@section('content')
    <div class='card'>
        <div class ='card-header'>
            <h1>Edit Product Movement</h1>
        </div>
        <div class='card-body'>
            <form action="{{ route('movements.update', $movement->movement_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="movement_id" class="form-label">Movement ID</label>
                    <input type="text" class="form-control" id="movement_id" value="{{ $movement->movement_id }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id"
                        required>
                        <option value="">Select a product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->product_id }}"
                                {{ old('product_id', $movement->product_id) == $product->product_id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty"
                        name="qty" value="{{ old('qty', $movement->qty) }}" min="1" required>
                    @error('qty')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="from_location" class="form-label">From Location (leave blank for incoming stock)</label>
                    <select class="form-control @error('from_location') is-invalid @enderror" id="from_location"
                        name="from_location">
                        <option value="">Incoming </option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->location_id }}"
                                {{ old('from_location', $movement->from_location) == $location->location_id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('from_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="to_location" class="form-label">To Location </label>
                    <select class="form-control @error('to_location') is-invalid @enderror" id="to_location"
                        name="to_location">
                        <option value="">Outgoing</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->location_id }}"
                                {{ old('to_location', $movement->to_location) == $location->location_id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('to_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @error('movement')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-evenly my-2">
                    <a href="{{ route('movements.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Movement</button>
                </div>
            </form>
        </div>
    </div>

@endsection
