@extends('layouts.app')

@section('content')
    <form action="{{ route('update_post_path', ['post' => $post->id]) }}" method="POST">
        <!-- Show errors -->
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ csrf_field() }} 
        {{ method_field('PUT') }}     
        <!-- Title Field -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>
        <!-- Description Field -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="5">{{ $post->description }}</textarea>
        </div>
        <!-- Url Field -->
        <div class="form-group">
            <label for="url">Url:</label>
            <input type="text" name="url" class="form-control" value="{{ $post->url }}">
        </div>
        <!-- Submit Form -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit Post</button>
        </div>
    </form>
@endsection