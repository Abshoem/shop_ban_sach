@extends('products.layout')

@section('content')
<!-- Custom CSS for Product Detail Page -->
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Roboto', sans-serif;
    }
    .product-container {
        margin-top: 100px;
    }
    .product-img {
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }
    .product-img:hover {
        transform: scale(1.05);
    }
    .product-title {
        font-weight: 700;
        color: #007bff;
    }
    .product-detail {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #6c757d;
    }
    .btn-custom {
        border-radius: 30px;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-custom:hover {
        transform: translateY(-2px);
    }
</style>

<div class="container product-container">
    <div class="row align-items-center">
        <!-- Product Image -->
        <div class="col-md-6 mb-4 mb-md-0">
            @if($product->image)
            <img src="{{ asset($product->image) }}" class="img-fluid product-img" alt="Product Image">
            @else
            <img src="https://via.placeholder.com/500x500" class="img-fluid product-img" alt="Placeholder Image">
            @endif
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="display-5 product-title">{{ $product->name }}</h1>
            <p class="product-detail">{{ $product->detail }}</p>
            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-dark btn-custom me-2">Back to Products</a>
                <a href="{{ route('products.buy', $product->id) }}" class="btn btn-success btn-custom">Buy</a>
            </div>
        </div>
    </div>
</div>
@endsection
