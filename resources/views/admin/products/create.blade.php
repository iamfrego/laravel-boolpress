@extends('layouts.admin')


@section('content')

    <h1>Create a new Product</h1>

    <form action="{{ route('admin.products.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Lenovo Laptop"
                aria-describedby="nameHelper" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" id="image" class="form-control" placeholder="https://"
                aria-describedby="imageHelper" value="{{ old('image') }}">
            >
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="https://"
                aria-describedby="priceHelper" value="{{ old('price') }}">

        </div>



        <button type="submit" class="btn btn-dark">Save</button>


    </form>

@endsection
