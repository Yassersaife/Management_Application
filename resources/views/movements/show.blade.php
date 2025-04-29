@extends('master')
@section('title', 'Movement Details')
@section('movements_active', 'active bg-light')


@section('content')

    <div class="card">

        <div class=" card-header d-flex justify-content-between align-items-center mb-4">

            <h1>Movement Details</h1>

            <a href="{{ route('movements.index') }}" class="btn btn-secondary">Back to Movement</a>
        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Movement ID</th>
                    <td>{{ $movement->movement_id }}</td>
                </tr>
                <tr>

                    <th>Timestamp</th>
                    <td>{{ $movement->created_at }}</td>
                </tr>
                <tr>


                    <th>Product</th>
                    <td>{{ $movement->product->name }}</td>
                </tr>

                <tr>

                    <th>From Location</th>
                    <td>{{ $movement->fromLocation ? $movement->fromLocation->name : 'Null' }}</td>
                </tr>


                <tr>
                    <th>To Location</th>
                    <td>{{ $movement->toLocation ? $movement->toLocation->name : 'Null' }}</td>
                </tr>


                <tr>
                    <th>Quantity</th>

                    <td>{{ $movement->qty }}</td>
                </tr>


            </table>
        </div>
    </div>


@endsection
