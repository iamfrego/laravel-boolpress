@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">

            @foreach ($posts as $post)
                <div class="col-4 mb-4">
                    <a class="text-decoration-none text-dark" href="{{ route('posts.show', $post->id) }}">
                        <div class="card" style="width: 18rem;">
                            <img height="200" src="{{ $post->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->body }}</p>
                                <p class="card-text">Categoria
                                    {{ $post->category ? $post->category->name : 'Uncategorized' }}</p>
                                <p class="card-text">
                                    Tags:
                                    @if (count($post->tags) > 0)
                                        @foreach ($post->tags as $tag)
                                            {{ $tag->name }}
                                        @endforeach
                                    @else
                                        <span>No tags</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                </div>




        </div>
        <!-- /.row -->

        <div>
            {{ $posts->links() }}
        </div>

    </div>
    <!-- /.container -->


@endsection
