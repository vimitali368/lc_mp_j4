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
                                    @if(isset($article->category))
                                        <p class="blog-post-category">{{ $article->category->title }}</p>
                                    @endif
                                    <h5 class="blog-post-category">Автор: {{ $article->author->name }}</h5>
                                    <h6 class="blog-post-title">{{ $article->title }}</h6>
                                </a>
                                <div>
                                    <div class="float-left">
                                        @auth()
                                            <div>
                                                <form action="{{ route('article.like.store', $article->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    <span>{{ $article->liked_users_count }}</span>
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        @if(auth()->user()->likedArticles->contains($article->id))
                                                            <i class="fas fa-heart"></i>
                                                        @else
                                                            <i class="far fa-heart"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        @endauth
                                        @guest()
                                            <div>
                                                <span>{{ $article->liked_users_count }}</span>
                                                <i class="far fa-heart"></i>
                                            </div>
                                        @endguest
                                    </div>
                                    <div class="float-right">
                                        <span>{{ $article->view_count }}</span>
                                        <i class="far fa-eye"></i>
                                    </div>
                                </div>
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
            @if($likedArticles->count() > 0)
                <div class="col-md-4 sidebar" data-aos="fade-left" style="margin-bottom: 100px;">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Фаворитные статьи</h5>
                        <ul class="post-list">
                            @foreach($likedArticles as $article)
                                <li class="post">
                                    <a href="{{ route('article.show', $article->id) }}" class="post-permalink media">
                                        @if( $article->preview_image != '' )
                                            <img src="{{ $article->preview_image }}" alt="blog post">
                                        @endif
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $article->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection
