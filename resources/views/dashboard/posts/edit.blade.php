@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus>
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug )}}" required>
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label @error('category') is-invalid @enderror">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
              @if (old('category_id', $post->category_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
            @endforeach
          </select>
          @error('category_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="input mb-3">
          <label for="image" class="form-label">Post Image</label>
          <input type="hidden" name="oldImage" value="{{ $post->image }}">
          @if ($post->image)
            <img src="{{ asset('storage/'. $post->image) }}" class="preview-img img-fluid col-sm-5 mb-3 d-block">
          @else
            <img class="preview-img img-fluid col-sm-5 mb-3">
          @endif
          
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
          @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body" class="@error('body') is-invalid @enderror"></trix-editor>
            @error('body')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function () {
    fetch('/dashboard/posts/checkslug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  function previewImage() {
    const img = document.querySelector('#image');
    const imgPreview = document.querySelector('.preview-img');

    imgPreview.style.display = 'block';

    const OFReader = new FileReader();
    OFReader.readAsDataURL(image.files[0]);

    OFReader.onload = function(OFReader) {
      imgPreview.src = OFReader.target.result;
    }
  }
</script>
@endsection