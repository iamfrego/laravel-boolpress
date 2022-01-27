@extends('layouts.admin')


@section('content')

    <h1>Create a new Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Post Name"
                aria-describedby="nameHelper" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" id="image" class="form-control" placeholder="https://"
                aria-describedby="imageHelper" value="{{ old('image') }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>


    </form>

@endsection
