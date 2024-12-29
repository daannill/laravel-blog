@extends('layouts/main')

@section('container')
    <h1 class="mb-5">Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/blog?category={{ $category->slug }}">
                        <div class="card text-bg-dark">
                            <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-3 fs-4" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                            {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small>Last updated 3 mins ago</small></p> --}}
                            </div>
                        </div>
                    </a>
                </div>  
            @endforeach
        </div>
    </div>
    
    {{-- <ul>
        @foreach ($categories as $category)
        <li>
            <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
        </li>
        @endforeach
    </ul> --}}
@endsection