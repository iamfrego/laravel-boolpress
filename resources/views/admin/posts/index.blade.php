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
                    <td><img width="100" src="{{ asset('storage/' . $post->image) }}" alt=""></td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}"><i
                                class="fas fa-eye fa-lg fa-fw text-black"></i></a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}">
                            <i class="fas fa-pencil-alt fa-lg fa-fw"></i>
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#post-{{ $post->id }}">
                            <i class="fas fa-trash fa-lg fa-fw"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="post-{{ $post->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Elimina</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Eliminazione non reversibile
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                data-bs-dismiss="modal">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
