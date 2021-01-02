@extends('layout')

@section('content')
    <div class="container">
        <div class="py-2">
            <a href="posts/create" class="btn btn-success">New Post</a>
        </div>
        <div class="card">
        <div class="card-header" style="text-align:center">
            Contents
        </div>
        <div class="card-body">
            @foreach($data as $post)
                <div>
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <div class="row">
                        <a href="/posts/{{ $post->id }}" class="mr-2 btn btn-primary">View</a>
                        <a href="/posts/{{ $post->id }}/edit" class="mr-2 btn btn-warning">Edit</a>
                        <div class="mr-2">
                            <form action="/posts/{{ $post->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class=" btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div><hr>
            @endforeach
            
        </div>
        </div>
    </div>
@endsection