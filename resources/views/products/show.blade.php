@extends('master')

@section('title', 'View Product')
@section('products_active', 'active bg-light')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Product Details</h1>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Product ID</th>
                    <td>{{ $product->product_id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $product->created_at }}</td>
                </tr>

            </table>
        </div>
    </div>
@endsection
