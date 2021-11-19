
    @extends('layouts.main')
 
    @section('container')

        <div class="row">
            <img src="https://source.unsplash.com/1600x500/?technology" class="img-fluid"> 
            <div style="margin-top: -130px; text-align:center;">
                <h1 style="color: white; font-weight: 700;">BACA KABAR DAN PENGALAMAN PROGRAMMING & DESAIN DENGAN BLOGAJA</h1>
            </div>
        </div>
        <div class="container mt-lg-3">
            <div class="card-blog" style="margin-top: 50px;">
                <h2>Artikel terbaru</h2>
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

    @endsection
 
