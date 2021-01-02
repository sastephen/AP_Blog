@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="text-align:center">
                Contents
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/posts/{{ $post->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" value="{{ old('name', $post->name) }}" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                        <textarea name="description" placeholder="Enter Description" class="form-control">
                            {{ old('description', $post->description) }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/posts" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection