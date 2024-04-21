  @extends('frontend.layouts.master')
  @section('title', 'Strategic Web' . ' - Press Details')
  @section('content')


      <div class="container">
          <div class="">
              <div class="mt-5">

                  <img src="{{ asset('images/article' . "/{$article->id}-1.{$article->image}") }}" class="image-height img-fluid mb-4"
                      alt="Post Image">

                  <h1 class=" mb-4">{{ $article->title }}</h1>
                  <p>{{ $article->author }}</p>
                  <p class="text-muted">Posted on {{ $article->created_at->format('F d, Y') }}</p>
                  <div class="post-content">
                      <p>{!! html_entity_decode($article->description) !!}</p>
                  </div>
              </div>

          </div>

      </div>

  @endsection
