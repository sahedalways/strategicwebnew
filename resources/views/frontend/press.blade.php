 @extends('frontend.layouts.master')
 @section('title', 'Strategic Web' . ' - Press')
 @section('content')

     <div class="container">
         <div class="col-lg-9 mx-auto container">
             <h2 class="fw-semibold pt-4">Latest News</h2>
         </div>
         @foreach ($articles as $article)
             @if ($article->display_priority === 'first')
                 <div class="container my-4 col-lg-9 mx-auto">
                     <a href="{{ route('press-details', ['id' => $article->id]) }}" style="text-decoration: none;"
                         class="mx-auto row text-dark rounded-4 overflow-hidden p-0 shadow-sm img-hover-effect">
                         <div class="col-md-8 p-0 img-sec">
                             <img src="{{ asset('images/article' . "/{$article->id}-1.{$article->image}") }}"
                                 alt="article-image" class="w-100">
                         </div>
                         <div class="col-md-4 p-4 bg-light shadow-sm">
                             <div style="font-size: 12px;" class="text-secondary mb-3">PRESS RELEASE</div>
                             <h2 class="fw-semibold">{{ $article->title }}</h2>
                             <p class="press-author">{{ $article->author }}</p>
                             <p class="press-desc">
                                 {!! substr(html_entity_decode($article->description), 0, 150) !!}
                                 {!! strlen($article->description) > 150 ? '...' : '' !!}
                             </p>
                             <div class="share-icons">
                                 <a href="#"
                                     onclick="shareToSocialMedia('{{ route('press-details', ['id' => $article->id]) }}')"
                                     class="share-icon"><i class="fa fa-share"></i></a>
                             </div>
                         </div>
                         <div style="font-size: 12px;" class="text-secondary mt-5 fw-semibold">
                             {{ $article->created_at->format('F d, Y') }}</div>
                     </a>
                 </div>
             @endif
         @endforeach

         <div class="container my-4 col-lg-9 mx-auto p-0">
             <div class="row mx-0">
                 @foreach ($articles as $article)
                     @if ($article->display_priority === 'middle')
                         <div class="col-md-6 mb-4">
                             <div class="rounded-4 overflow-hidden p-0 shadow-sm img-hover-effect">
                                 <a style="text-decoration: none;"
                                     href="{{ route('press-details', ['id' => $article->id]) }}"
                                     class="shadow-sm text-dark">
                                     <div class="img-sec">
                                         <img src="{{ asset('images/article' . "/{$article->id}-1.{$article->image}") }}"
                                             alt="article-image" class="w-100">
                                     </div>

                                     <div class="content-sec p-4">
                                         <div style="font-size: 12px;" class="text-secondary mb-2 fw-semibold">PHOTOS</div>

                                         <h4 class="fw-semibold">{{ $article->title }}</h4>
                                         <p class="press-author">{{ $article->author }}</p>
                                         <p class="press-desc">
                                             {!! substr(html_entity_decode($article->description), 0, 150) !!}
                                             {!! strlen($article->description) > 150 ? '...' : '' !!}
                                         </p>

                                         <div class="share-icons">
                                             <a href="#"
                                                 onclick="shareToSocialMedia('{{ route('press-details', ['id' => $article->id]) }}')"
                                                 class="share-icon"><i class="fa fa-share"></i></a>
                                         </div>
                                         <div style="font-size: 12px;" class="text-secondary mt-5 fw-semibold">
                                             {{ $article->created_at->format('F d, Y') }}</div>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     @endif
                 @endforeach

             </div>

         </div>

         <div class="container my-4 col-lg-9 mx-auto p-0">

             <div class="row mx-0">
                 @foreach ($articles as $article)
                     @if ($article->display_priority === 'last')
                         <div class="col-md-4 mb-4">
                             <div class="rounded-4 overflow-hidden shadow-sm p-0 mr-md-3 img-hover-effect">
                                 <a style="text-decoration: none;"
                                     href="{{ route('press-details', ['id' => $article->id]) }}"
                                     class="shadow-sm text-dark">
                                     <div class="img-sec">
                                         <img src="{{ asset('images/article' . "/{$article->id}-1.{$article->image}") }}"
                                             alt="article-image" class="w-100">
                                     </div>
                                     <div class="content-sec p-4">
                                         <div style="font-size: 12px;" class="text-secondary mb-2 fw-semibold">Update</div>
                                         <h4 class="fw-semibold">{{ $article->title }}</h4>
                                         <p class="press-author">{{ $article->author }}</p>
                                         <p class="press-desc">
                                             {!! substr(html_entity_decode($article->description), 0, 150) !!}
                                             {!! strlen($article->description) > 150 ? '...' : '' !!}
                                         </p>
                                         <div class="share-icons">
                                             <a href="#"
                                                 onclick="shareToSocialMedia('{{ route('press-details', ['id' => $article->id]) }}')"
                                                 class="share-icon"><i class="fa fa-share"></i></a>
                                         </div>
                                         <div style="font-size: 12px;" class="text-secondary mt-5 fw-semibold">
                                             {{ $article->created_at->format('F d, Y') }}</div>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     @endif
                 @endforeach
             </div>
         </div>
     </div>

 @endsection

 @section('script')
     <script>
         function shareToSocialMedia(url) {
             // Show a modal or dropdown menu for users to choose social media platform
             // For simplicity, let's use window.prompt to ask for user input
             var platform = window.prompt('Share to which platform? (facebook, twitter, email)');

             // Based on user input, open the corresponding share URL
             if (platform) {
                 platform = platform.toLowerCase(); // Convert input to lowercase

                 if (platform === 'facebook') {
                     window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, '_blank');
                 } else if (platform === 'twitter') {
                     window.open('https://twitter.com/share?url=' + url, '_blank');
                 } else if (platform === 'email') {
                     window.open('mailto:?body=' + url, '_blank');
                 } else {
                     alert('Invalid platform. Please choose facebook, twitter, or email.');
                 }
             }
         }
     </script>

 @endsection
