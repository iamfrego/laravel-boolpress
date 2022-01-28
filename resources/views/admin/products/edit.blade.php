@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1>Edit Product</h1>
            <label for="name">Name </label>
            <input type="text" name="name" id="" value="{{ $product->name }}">

            <label for="image">Image</label>
            <input type="text" name="image" id="" value="{{ $product->image }}">

            <label for="price">Price</label>
            <input type="text" name="price" id="" value="{{ $product->price }}">

            <div class=" mb-3">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Action</button>
                </div>
            </div>
        </form>
    </div>

@endsection
