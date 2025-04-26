@extends('master')

@section('title', 'Add Product')
@section('products_active', 'active bg-light')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add New Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product ID (optional)</label>
                    <input type="text" class="form-control @error('product_id') is-invalid @enderror" id="product_id"
                        name="product_id" value="{{ old('product_id') }}" placeholder="Leave blank for auto-generated ID">
                    @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

        </div>
        <div class="d-flex justify-content-evenly mb-3 ">
            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
        </form>
    </div>
    </div>
@endsection
