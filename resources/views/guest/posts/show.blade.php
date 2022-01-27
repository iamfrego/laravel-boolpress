@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="product d-flex my-5">
            <img src="{{ $post->image }}" alt="{{ $post->name }}">

            <div class="details p-4">
                <h1 class="card-title">{{ $post->name }}</h1>
                <p class="card-text">{{ $post->price }}</p>
            </div>

        </div>

        <div class="actions">
            <a class="btn btn-dark" href="{{ route('posts.index') }}">Back to Posts</a>
        </div>
    </div>
@endsection
