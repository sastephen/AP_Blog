@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="text-align:center">
                Contents
            </div>
            <div class="card-body">
                <form action="/posts" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                        <textarea name="description" placeholder="Enter Description" class="form-control">
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="category_id" id="">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection