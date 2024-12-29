@extends('layouts/main')

@section('container')
    <h2 class="mb-3 text-center">{{ $title }}</h2>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                
                <div class="input-group mb-3">
                    <input name="search" type="text" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <img src="{{ asset('storage/'. $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small class="text-body-secondary">
                        By <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in 
                        <a class="text-decoration-none" href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="">
                            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                            @if ($post->image)
                                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
                            @else
                                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                <p>
                                    <small class="text-body-secondary">
                                        By <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="fs-4 text-center">No Post Found</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>

    {{-- @foreach ($posts->skip(1) as $post)
    <article class="mb-5 border-bottom pb-4">
        <h4><a class="text-decoration-none" href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
        <h6>
            By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in 
            <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </h6>
        <p>{{ $post->excerpt }}</p>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none"> Read more ...</a>
    </article>
    @endforeach --}}
@endsection