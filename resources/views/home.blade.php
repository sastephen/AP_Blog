@extends('layout')

@section('content')
    <div class="container">
        <div class="py-2">
            <a href="posts/create" class="btn btn-success">New Post</a>
            <a href="/logout" class="btn btn-success">LogOut</a>
            <h4 class="text-success" style="float: right">{{ Auth::user()->name }}</h4>
        </div>
        <div class="card">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session('status') }}
              </div>
            @endif
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