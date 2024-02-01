@extends('layouts.app')

@section('content')
@include('layouts.navbar')
    <div class="container">
        <h1>All Products</h1>

        <div class="product-container">
            @foreach ($products as $product)
                <div class="card">
                    <img src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->category }}</p>
                        <p class="card-text">{{ $product->quantity }}</p>
                        <p class="card-text price">${{ $product->price }}</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
