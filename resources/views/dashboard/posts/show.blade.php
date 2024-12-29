@extends('dashboard.layouts.main')

@section('container')

<div class="row my-3">
    <div class="col-lg-8">
        <h1 class="mb5">{{ $post->title }}</h1>

        <a href="/dashboard/posts" class="btn btn-success">Back to my posts</a>
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">Edit</a>
        <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger pt-2" onclick="return confirm('Are you sure?')">Delete</button>
        </form>

        @if ($post->image)
          <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">
        @else
          <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">
        @endif

        <div class="mt-3">
          {!! $post->body !!}
        </div>

        <a href="/dashboard/posts">Back to Blog menu</a>
    </div>
</div>

@endsection