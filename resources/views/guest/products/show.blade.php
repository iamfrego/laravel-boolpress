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


        @auth
            <div class="actions">
                <a class="btn btn-dark" href="{{ route('admin.products.index') }}">Back to Admin</a>
            </div>
        @endauth
    </div>
@endsection
