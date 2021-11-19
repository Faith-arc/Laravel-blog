@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <div class="position-absolute text-white mt-3" style="background-color: rgba(0, 0, 0, 0.7)"><a style="text-decoration: none; color:white;" href="/blogs?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                @if ($post->image)
                <div class="img-fluid mt-3">     
                    <img width="700px" height="400px" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"  class="card-img-top img-fluid" alt="{{ $post->category->name }}">                    
                @endif
                <h6>By:  <a style="text-decoration: none"  href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" style="text-decoration: none">{{ $post->category->name }}</a></h6>
                <article class="my-3 fs-6">
                {!! $post->body !!}
                </article>
                <a style="text-decoration: none; display:block;" href="/blogs">Back to blog</a>
            </div>
        </div>
    </div>

{{-- <article>
    <h1 class="mb-5">{{ $post->title }}</h1>
    <h6>By:  <a style="text-decoration: none"  href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" style="text-decoration: none">{{ $post->category->name }}</a></h6>
    {!! $post->body !!}
    <a style="text-decoration: none; display:block;" href="/blogs">Back to blog</a>
</article> --}}
@endsection
