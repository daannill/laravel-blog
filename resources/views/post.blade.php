@extends('layouts/main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb5">{{ $post->title }}</h1>
                <p>By <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                @if ($post->image)
                    <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                
                {!! $post->body !!}
                <a href="/blog">Back to Blog menu</a>
            </div>
        </div>
    </div>

    {{-- <article>
        <h2>{{ $post->title }}</h2>
        <h5>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
        {!! $post->body !!}
    </article> --}}
@endsection