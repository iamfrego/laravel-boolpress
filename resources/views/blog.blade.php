@extends('layouts.app')

@section('content')

    <h1> SPA Blog</h1>

    <div class="card text-left" v-for="post in posts">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">@{{ post.name }}</h4>
        </div>
    </div>

@endsection
