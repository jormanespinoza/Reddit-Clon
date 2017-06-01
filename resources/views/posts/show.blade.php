@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
            <p><a href="{{ $post->url }}" target="_blank">{{ $post->url }}</a></p>
            <p>Posted {{ $post->created_at->diffForHumans() }}</p>
        </div>
    </div>    
    <hr>
    <a href="{{ route('posts_path') }}" class="btn btn-primary">Back</a>                    
@endsection