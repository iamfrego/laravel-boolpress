@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row gy-2">
            @foreach ($posts as $post)

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $post->image }}" alt="{{ $post->name }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->name }}</h4>
                            <p class="card-text">{{ $post->price }}</p>
                            <a href="{{ route('posts.show', $post->id) }}">View Post</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
