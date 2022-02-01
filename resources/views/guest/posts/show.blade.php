@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="post d-flex my-5">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}">

            <div class="details p-4">
                <h1 class="card-title">{{ $post->name }}</h1>
                <p class="card-text">{{ $post->price }}</p>
            </div>

            <div class="metadata">
                <div class="category">

                    @if ($post->category)
                        Category: <p>{{ $post->category->name }}</p>
                    @else
                        <span>'Uncategorized'</span>
                    @endif

                </div>
                <div class="tags">
                    Tags:
                    @forelse($post->tags as $tag)
                        <p>{{ $tag->name }}</p>
                    @empty
                        <span>Untagged</span>
                    @endforelse

                </div>
            </div>
            <div class="content">
                <p>
                    {{ $post->body }}
                </p>
            </div>

        </div>

        <div class="actions">
            <a class="btn btn-dark" href="{{ route('posts.index') }}">Back to Posts</a>
        </div>
    </div>
@endsection
