@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="product d-flex my-5">
            <img src="{{ $product->image }}" alt="{{ $product->name }}">

            <div class="details p-4">
                <h1 class="card-title">{{ $product->name }}</h1>
                <p class="card-text">{{ $product->price }}</p>
            </div>

        </div>

        <div class="actions">
            <a class="btn btn-dark" href="{{ route('products.index') }}">Back to Products</a>
        </div>
    </div>
@endsection
