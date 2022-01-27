@extends('layouts.app')

@section('content')

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="my-5">Hola</h1>
            <p>
                <a class="btn btn-dark btn-lg" href="{{ route('products.index') }}" role="button">
                    Vai allo shop</a>
            </p>
            <p>
                <a class="btn btn-dark btn-lg" href="{{ route('posts.index') }}" role="button">
                    Vai ai post</a>
            </p>
        </div>
    </div>

@endsection
