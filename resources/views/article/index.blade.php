@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Журналистское агентство "Воко"</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $article->preview_image ) }}" alt="blog post">
{{--                                <img src="{{ url('storage/' . $article->preview_image) }}" alt="blog post">--}}
                            </div>
{{--                            <p class="blog-post-category">{{ $article->category->title }}</p>--}}
                            <a href="{{ route('article.show', $article->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $article->title }}</h6>
                            </a>
                        </div>
{{--                        @auth()--}}
{{--                            <div>--}}
{{--                                <form action="{{ route('article.like.store', $article->id) }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <span>{{ $article->liked_users_count }}</span>--}}
{{--                                    <button type="submit" class="border-0 bg-transparent">--}}
{{--                                        @if(auth()->user()->likedPosts->contains($article->id))--}}
{{--                                            <i class="fas fa-heart"></i>--}}
{{--                                        @else--}}
{{--                                            <i class="far fa-heart"></i>--}}
{{--                                        @endif--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        @endauth--}}
{{--                        @guest()--}}
{{--                            <div>--}}
{{--                                <span>{{ $article->liked_users_count }}</span>--}}
{{--                                <i class="far fa-heart"></i>--}}
{{--                            </div>--}}
{{--                        @endguest--}}
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -100px;">
                        {{ $articles->links() }}
                    </div>
                </div>
            </section>
{{--            <div class="row">--}}
{{--                <div class="col-md-8">--}}
{{--                    <section>--}}
{{--                        <div class="row blog-post-row">--}}
{{--                            @foreach($randomArticles as $article)--}}
{{--                                <div class="col-md-6 blog-post" data-aos="fade-up">--}}
{{--                                    <div class="blog-post-thumbnail-wrapper">--}}
{{--                                        <img src="{{ 'storage/' . $article->preview_image }}" alt="blog post">--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <p class="blog-post-category">{{ $article->category->title }}</p>--}}
{{--                                        @auth()--}}
{{--                                            <form action="{{ route('article.like.store', $article->id) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                <span>{{ $article->liked_users_count }}</span>--}}
{{--                                                <button type="submit" class="border-0 bg-transparent">--}}
{{--                                                    @if(auth()->user()->likedArticles->contains($article->id))--}}
{{--                                                        <i class="fas fa-heart"></i>--}}
{{--                                                    @else--}}
{{--                                                        <i class="far fa-heart"></i>--}}
{{--                                                    @endif--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        @endauth--}}
{{--                                        @guest()--}}
{{--                                            <div>--}}
{{--                                                <span>{{ $article->liked_users_count }}</span>--}}
{{--                                                <i class="far fa-heart"></i>--}}
{{--                                            </div>--}}
{{--                                        @endguest--}}
{{--                                    </div>--}}
{{--                                    <a href="{{ route('article.show', $article->id) }}" class="blog-post-permalink">--}}
{{--                                        <h6 class="blog-post-title">{{ $article->title }}</h6>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 sidebar" data-aos="fade-left">--}}
{{--                    <div class="widget widget-post-list">--}}
{{--                        <h5 class="widget-title">Популярные статьи</h5>--}}
{{--                        <ul class="post-list">--}}
{{--                            @foreach($randomArticles as $article)--}}
{{--                                <li class="post">--}}
{{--                                    <a href="{{ route('article.show', $article->id) }}" class="post-permalink media">--}}
{{--                                        <img src="{{ 'storage/' . $article->preview_image }}" alt="blog post">--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="post-title">{{ $article->title }}</h6>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="widget">--}}
{{--                        <h5 class="widget-title">Categories</h5>--}}
{{--                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories"--}}
{{--                             class="w-100">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </main>
@endsection
