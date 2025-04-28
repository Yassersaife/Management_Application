@extends('master')
@section('title', 'Movement')
@section('movements_active', 'active bg-light')

@section('content')
    <div class='d-flex justify-content-between  align-items-center my-2'>
        <h1>Product Movement</h1>
        <a class="btn btn-primary" href="{{ route('movements.create') }}">Add New Movement</a>
    </div>

    <div class='card'>
        <div class='card-body'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID movement</th>
                        <th>from location</th>
                        <th>to location </th>
                        <th>product name </th>
                        <th>Quantity</th>
                        <th>Actions</th>

                        </th>
                </thead>
                <tbody>
                    @foreach ($movements as $movement)
                        <tr>
                            <th>{{ $movement->movement_id }}</th>
                            <th>{{ $movement->from_location ? $movement->fromLocation->name : 'Null' }}</th>
                            <th>{{ $movement->to_location ? $movement->tolocation->name : 'Null' }}</th>
                            <th>{{ $movement->product->name }}</th>
                            <th>{{ $movement->qty }}</th>
                            <th>
                                <a class="btn btn-primary" href="{{ route('movements.show', $movement) }}">Show </a>
                                <a class="btn btn-warning" href="{{ route('movements.edit', $movement) }}">Edit</a>
                                <form action="{{ route('movements.destroy', $movement) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this Movement?')">Delete</button>
                                </form>

                            </th>
                        <tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>


@endsection
