@extends('layouts.admin')


@section('content')

    <div class="container mt-5">
        <h1>Categories</h1>
        <div class="row">
            <div class="col-md-8">
                <!-- Form per creare una categoria -->
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Category name here"
                            aria-describedby="nameHelper">
                        <small id="nameHelper" class="text-muted">Type a category name: </small>
                    </div>
                    <button type="submit" class="btn btn-dark">Add category</button>
                </form>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <p>{{ $category->name }}</p>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger">
                                    <i class="fas fa-trash fa-lg fa-fw"></i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
