@extends('layouts.app')

@section('title', $product->name . ' - Online Shop')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image ?? 'https://via.placeholder.com/500x500' }}" alt="{{ $product->name }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">Category: <a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></p>
            
            <div class="mb-3">
                @if($product->discount_price)
                    <span class="h3 text-decoration-line-through text-muted">${{ $product->price }}</span>
                    <span class="h2 text-danger ms-2">${{ $product->discount_price }}</span>
                    <span class="badge bg-danger ms-2">
                        {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% OFF
                    </span>
                @else
                    <span class="h2">${{ $product->price }}</span>
                @endif
            </div>

            <div class="mb-3">
                @if($product->quantity > 0)
                    <span class="badge bg-success">In Stock ({{ $product->quantity }} available)</span>
                @else
                    <span class="badge bg-danger">Out of Stock</span>
                @endif
            </div>

            <p>{{ $product->description }}</p>

            @if($product->quantity > 0)
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{ $product->quantity }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                </form>
            @else
                <button class="btn btn-secondary btn-lg" disabled>Out of Stock</button>
            @endif
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->isNotEmpty())
        <div class="mt-5">
            <h3>Related Products</h3>
            <div class="row">
                @foreach($relatedProducts as $related)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card product-card">
                            <img src="{{ $related->image ?? 'https://via.placeholder.com/300x200' }}" class="card-img-top product-image" alt="{{ $related->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($related->name, 20) }}</h5>
                                <p class="card-text">${{ $related->final_price }}</p>
                                <a href="{{ route('products.show', $related->slug) }}" class="btn btn-primary btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection