  @extends('frontend.layouts.master')
  @section('title', 'Strategic Web' . ' - Press Details')
  @section('content')

      <div class="container my-4 col-lg-9 mx-auto">
          <div style="text-decoration: none;"
              class="mx-auto row text-dark rounded-4 overflow-hidden p-0 shadow-sm img-hover-effect">
              <div class="col-md-8 p-0 img-sec">
                  <img src="{{ asset('images/article' . "/{$article->id}-1.{$article->image}") }}" alt="article-image"
                      class="w-100">
              </div>
              <div class="col-md-4 p-4 bg-light shadow-sm">
                  <div style="font-size: 12px;" class="text-secondary mb-3">PRESS RELEASE</div>

                  <h2 class="fw-semibold">{{ $article->title }}</h2>
                  <p class="fw-semibold">{{ $article->description }}</p>
              </div>
          </div>
      </div>

  @endsection
