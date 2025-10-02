@extends('layouts.app') {{-- if you already have a main layout --}}
@section('content')
    <div class="container">
        <h1>My Orders</h1>

        @if($orders->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Placed At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No orders found.</p>
        @endif
    </div>
@endsection
