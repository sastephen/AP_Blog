@extends('layout')

@section('content')
    <div class="container">
        <div class="py-2">
            <a href="/posts/create" class="btn btn-success">New Post</a>
        </div>
        <div class="card">
        <div class="card-header" style="text-align:center">
            Contents
        </div>
        <div class="card-body">
                <div>
                    <h5 class="card-title">{{ $post->name }} <b>{{'Category :' .  $post->category->name }}</b></h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <a href="/posts/{{ $post->id }}" class="btn btn-primary">View</a>
                </div>
        </div>
        </div>
    </div>
@endsection