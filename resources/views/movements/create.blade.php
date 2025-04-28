@extends('master')
@section('title', 'New Movement')
@section('movements_active', 'active bg-light')
@section('content')
    <div class='card'>
        <div class ='card-header'>
            <h1> Add new Movement</h1>
        </div>
        <div class='card-body'>
            <form method="POST" action="{{ route('movements.store') }} ">
                @csrf
                <div class="mb-3">
                    <label for="movement_id" class="form-label">Movement ID (optional)</label>
                    <input type='text' name="movement_id" id="movement_id"
                        class="form-control 
                @error('movement_id') is-invalid @enderror"
                        value="{{ old('movement_id') }}" placeholder="Leave blank for auto-generated ID" />
                    @error('movement_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="from_location" class="form-label">From Location</label>
                    <select class="form-control @error('from_location') is-invalid @enderror" id="from_location"
                        name="from_location">
                        <option value="">Incoming</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->location_id }}"
                                {{ old('from_location') == $location->location_id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('from_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for='to_location' class="form-label">To Location</label>
                    <select class="form-control  @error('to_location') is-invalid @enderror" name='to_location'
                        id="to_location">
                        <option value="">Outcoming</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->location_id }}"
                                {{ old('to_location') == $location->location_id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('to_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id"
                        required>
                        <option value="">Select a product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->product_id }}"
                                {{ old('product_id') == $product->product_id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type='number' name="qty" id="quantity" min="1"
                        class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}" />
                    @error('qty')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @error('movement')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class='d-flex justify-content-evenly mb-3'>
                    <a href="{{ route('movements.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Movement</button>
                </div>
            </form>
        </div>
    </div>
@endsection
