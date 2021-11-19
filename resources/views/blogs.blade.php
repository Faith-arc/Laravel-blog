
    @extends('layouts.main')
 
    @section('container')
      <h1 class="mb-3 text-center">{{ $title }}</h1>

      <div class="row-justify-content-center mb-3">
        <div class="col-md-6">
          <form action="/blogs" method="GET">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
              <button class="btn btn-dark" type="button">Button</button>
            </div>
          </form>
        </div>
      </div>

    @if ($posts->count())
      <div class="card mb-5">
        @if ($posts[0]->image)
        <div style="max-height: 300px; overflow:hidden;">      
            <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" height="500px" class="card-img-top">
        </div>
        @else                  
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif
        <div class="card-body text-center">
          <h3 class="card-title">{{ $posts[0]->title }}</h3>
          <h6><small class="text-muted">By: <a style="text-decoration: none"  href="/blogs?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a style="text-decoration: none" href="/blogs?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> <br> {{ $posts[0]->created_at->diffForHumans() }}</small></h6>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          <a href="/blogs/{{ $posts[0]->slug }}" style="text-decoration: none" class="btn btn-dark">Read more</a>
        </div>
      </div>
   

    <div class="container">
      <div class="row">
        
    @foreach ($posts as $post)

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a style="text-decoration: none; color:white;" href="/blogs?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
            @if ($post->image)    
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="card-img-top">
            @else                  
            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"  class="card-img-top" alt="{{ $post->category->name }}">
            @endif
            <div class="card-body">
              <h5 class="card-title"><a href="/blogs/{{ $post->slug }}" style="text-decoration: none">{{ $post->title }}</a></h5>
              <p><small class="text-muted">By: <a style="text-decoration: none"  href="/blogs?author={{ $post->author->username }}">{{ $post->author->name }}</a> <br> {{ $post->created_at->diffForHumans() }}</small></p>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a class="btn btn-dark" href="/blogs/{{ $post->slug }}" style="text-decoration: none">Read more</a>
            </div>
          </div>
        </div>

     @endforeach

      </div>
    </div>

    @else
    <p class="text-center fs-4">No Post Found.</p>
    @endif

    <div class="d-flex justify-content-end">
      {{ $posts->links() }}
    </div>

    @endsection
 
