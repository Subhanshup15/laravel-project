@extends('layouts.app')

@section('title', 'Home - Online Shop')

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Welcome to OnlineShop</h1>
                <p class="lead">Discover amazing products at unbeatable prices!</p>
                <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Shop Now</a>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x300" alt="Shopping" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Shop by Category</h2>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <a href="{{ route('products.category', $category->slug) }}" class="text-decoration-none">
                        <div class="card category-card text-center">
                            <div class="card-body">
                                <img src="{{ $category->image ?? 'https://via.placeholder.com/100' }}" alt="{{ $category->name }}" class="img-fluid mb-2" style="height: 80px;">
                                <h6 class="card-title">{{ $category->name }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card product-card">
                        <img src="{{ $product->image ?? 'https://via.placeholder.com/300x200' }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($product->name, 20) }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($product->description, 50) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if($product->discount_price)
                                        <span class="text-decoration-line-through text-muted">${{ $product->price }}</span>
                                        <span class="h5 text-danger">${{ $product->discount_price }}</span>
                                    @else
                                        <span class="h5">${{ $product->price }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">View All Products</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-sm-6 mb-4">
                <i class="fas fa-truck fa-3x text-primary mb-3"></i>
                <h4>Free Shipping</h4>
                <p>On orders over $50</p>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                <h4>Secure Payment</h4>
                <p>100% secure transactions</p>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <i class="fas fa-undo fa-3x text-primary mb-3"></i>
                <h4>Easy Returns</h4>
                <p>30-day return policy</p>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                <h4>24/7 Support</h4>
                <p>Dedicated customer service</p>
            </div>
        </div>
    </div>
</section>
@endsection