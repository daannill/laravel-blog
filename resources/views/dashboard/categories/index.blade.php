@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-5" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive small col-lg-5">
  <a href="/dashboard/categories/create" class="btn btn-primary my-2">Create New Category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name}}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge text-bg-primary pt-2"><i class="bi bi-eye"></i></a>
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge text-bg-warning pt-2"><i class="bi bi-pencil-square"></i></a>
            <form action="/dashboard/categories/{{ $category->slug }}" class="d-inline" method="post">
              @method('delete')
              @csrf
              <button type="submit" class="badge text-bg-danger pt-2 border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
            
        @endforeach
    </tbody>
  </table>
</div>
@endsection