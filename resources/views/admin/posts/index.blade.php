@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>
    <a name="" id="" class="btn btn-dark" href="{{ route('admin.posts.create') }}" role="button">Create Post</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td><img width="100" src="{{ $post->image }}" alt=""></td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}"><i
                                class="fas fa-eye fa-lg fa-fw text-black"></i></a>
                        <i class="fas fa-pencil-alt fa-lg fa-fw"></i>
                        <i class="fas fa-trash fa-lg fa-fw"></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
