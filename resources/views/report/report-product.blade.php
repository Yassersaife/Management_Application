@extends('master')
@section('title', 'Product Balance Report')
@section('report_active', 'active bg-light')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Product Balance Report</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Warehouse</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balances as $balance)
                        <tr>
                            <td>{{ $balance['product'] }}</td>
                            <td>{{ $balance['warehouse'] }}</td>
                            <td>{{ $balance['qty'] }}</td>
                        </tr>
                    @endforeach
                    @if (count($balances) == 0)
                        <tr>
                            <td colspan="3" class="text-center">No balance data available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
