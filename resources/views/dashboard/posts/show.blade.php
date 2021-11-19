@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><span  data-feather="arrow-left"></span>Back to All</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span  data-feather="edit"></span>Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Yakin mau hapus data?')"><span  data-feather="x-circle"></span>Delete</button>
                  </form>

                @if ($post->image)
                <div style="max-height: 300px; overflow:hidden;">     
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" height="500px">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"  class="card-img-top img-fluid mt-3" alt="{{ $post->category->name }}">                    
                @endif

                <article class="my-3 fs-6">
                {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
</main>
@endsection