@extends('layouts.app')

@section('content')

    <form action="{{ route('store_post_path') }}" method="POST">
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
        <!-- Title Field -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <!-- Description Field -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
        </div>
        <!-- Url Field -->
        <div class="form-group">
            <label for="url">Url:</label>
            <input type="text" name="url" class="form-control" value="{{ old('url') }}">
        </div>
        <!-- Submit Form -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>
    </form>

@endsection