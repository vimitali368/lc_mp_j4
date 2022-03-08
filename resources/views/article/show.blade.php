@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $article->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
{{--                {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i') }} •--}}
{{--                {{ $article->comments->count() }} Комментария--}}
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $article->preview_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $article->description !!}
                    </div>
                </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $article->content !!}
                    </div>
                </div>
            </section>
{{--            <div class="row">--}}
{{--                <div class="col-lg-9 mx-auto">--}}
{{--                    <section class="py-3">--}}
{{--                        @auth()--}}
{{--                            <form action="{{ route('article.like.store', $article->id) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <span>{{ $article->liked_users_count }}</span>--}}
{{--                                <button type="submit" class="border-0 bg-transparent">--}}
{{--                                    @if(auth()->user()->likedPosts->contains($article->id))--}}
{{--                                        <i class="fas fa-heart"></i>--}}
{{--                                    @else--}}
{{--                                        <i class="far fa-heart"></i>--}}
{{--                                    @endif--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        @endauth--}}
{{--                        @guest()--}}
{{--                            <div>--}}
{{--                                <span>{{ $article->liked_users_count }}</span>--}}
{{--                                <i class="far fa-heart"></i>--}}
{{--                            </div>--}}
{{--                        @endguest--}}
{{--                    </section>--}}
{{--                    @if($relatedArticles->count() > 0)--}}
{{--                        <section class="related-posts">--}}
{{--                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>--}}
{{--                            <div class="row">--}}
{{--                                @foreach($relatedArticles as $relatedPost)--}}
{{--                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">--}}
{{--                                        <img src="{{ asset('storage/' . $relatedPost->preview_image) }}"--}}
{{--                                             alt="related post"--}}
{{--                                             class="post-thumbnail">--}}
{{--                                        <p class="post-category">{{ $relatedPost->category->title }}</p>--}}
{{--                                        <a href="{{ route('article.show', $relatedPost->id) }}">--}}
{{--                                            <h5 class="post-title">{{ $relatedPost->title }}</h5>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </section>--}}
{{--                    @endif--}}
{{--                    <section class="comment-list mb-5">--}}
{{--                        <h2 class="section-title mb-5" data-aos="fade-up">--}}
{{--                            Комментарии ( {{ $article->comments->count() }} )--}}
{{--                        </h2>--}}
{{--                        @foreach($article->comments as $comment)--}}
{{--                            <div class="comment-text mb-3">--}}
{{--                            <span class="username">--}}
{{--                                <div>--}}
{{--                                    {{ $comment->user->name }}--}}
{{--                                </div>--}}
{{--                                <span--}}
{{--                                    class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>--}}
{{--                            </span>--}}
{{--                                {{ $comment->message }}--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </section>--}}
{{--                    @auth()--}}
{{--                        <section class="comment-section">--}}
{{--                            <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>--}}
{{--                            <form action="{{ route('article.comment.store', $article->id) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-12" data-aos="fade-up">--}}
{{--                                        <label class="sr-only">Комментарий</label>--}}
{{--                                        <textarea name="message" class="form-control"--}}
{{--                                                  placeholder="Напишите здесь ваш комментарий!"--}}
{{--                                                  rows="10"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12" data-aos="fade-up">--}}
{{--                                        <input type="submit" value="Отправить комментарий" class="btn btn-warning">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </section>--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </main>
@endsection
