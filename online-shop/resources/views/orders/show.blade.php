@extends('layouts.app') {{-- or your main layout --}}
@section('content')
<div class="container">
    <h1>Order Details</h1>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Total:</strong> ₹{{ $order->total }}</p>

    <h3>Items:</h3>
    @if($order->items->count())
        <ul>
            @foreach($order->items as $item)
                <li>
                    {{ $item->product->name }} - Qty: {{ $item->quantity }} - ₹{{ $item->price }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No items found.</p>
    @endif

</div>
@endsection
