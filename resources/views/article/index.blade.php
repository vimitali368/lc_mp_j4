@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Журналистское агентство "Воко"</h1>
            @if($articles->count() > 0)
                <section class="featured-posts-section">
                    <div class="row">
                        @foreach($articles as $article)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                                <a href="{{ route('article.show', $article->id) }}" class="blog-post-permalink">
                                    @if( $article->preview_image != '' )
                                        <div class="blog-post-thumbnail-wrapper">
                                            <img src="{{ $article->preview_image }}" alt="blog post">
                                        </div>
                                    @endif
                                    {{--                            <p class="blog-post-category">{{ $article->category->title }}</p>--}}
                                    <h6 class="blog-post-title">{{ $article->title }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="mx-auto" style="margin-bottom: 100px;">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </main>
@endsection
