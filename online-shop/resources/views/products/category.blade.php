@extends('layouts.app')

@section('title', $category->name)

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">{{ $category->name }}</h2>

        <div class="row">
            @forelse($products as $product)
                <div class="col-md-3 col-sm-4 col-6 mb-3">
                    <div class="card text-center">
                        <img src="{{ $product->image ?? 'https://via.placeholder.com/150' }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}" 
                             style="height: 150px;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="card-text">₹{{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No products found in this category.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
