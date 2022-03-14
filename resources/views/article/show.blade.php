@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $article->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i') }} •
                {{ $article->comments->count() }} Комментария
            </p>
            @if( $article->preview_image != '' )
                <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ $article->preview_image }}" alt="featured image" class="w-100">
                </section>
            @endif
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
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-3">
                        @auth()
                            {{--                            @dd($article->id)--}}
                            <form action="{{ route('article.like.store', $article->id) }}" method="POST">
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
                        @endauth
                        @guest()
                            <div>
                                <span>{{ $article->liked_users_count }}</span>
                                <i class="far fa-heart"></i>
                            </div>
                        @endguest
                    </section>
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие статьи</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <a href="{{ route('article.show', $relatedPost->id) }}">
                                            <img src="{{ $relatedPost->preview_image }}"
                                                 alt="related post"
                                                 class="post-thumbnail">
                                            {{--                                        <p class="post-category">{{ $relatedPost->category->title }}</p>--}}
                                            <h5 class="article-title">{{ $relatedPost->title }}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5" data-aos="fade-up">
                            Комментарии ( {{ $article->comments->count() }} )
                        </h2>
                        @foreach($article->comments as $comment)
                            <div class="comment-text mb-3">
                            <span class="username">
                                <div>
                                    {{ $comment->user->name }}
                                </div>
                            </span>
                                <span
                                    class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                </span>
                                {{ $comment->message }}
                            </div>
                        @endforeach
                    </section>
                    @auth()
                        @if(auth()->user()->can('add comments'))
                            {{--                        @dd($article->id))--}}
                            <section class="comment-section">
                                <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                                <form action="{{ route('article.comment.store', $article->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12" data-aos="fade-up">
                                            <label class="sr-only">Комментарий</label>
                                            <textarea name="message" class="form-control"
                                                      placeholder="Напишите здесь ваш комментарий!"
                                                      rows="10"></textarea>
                                            @error('message')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--                                    <div class="row">--}}
                                    <div class="form-group">
                                        <div class="captcha">
                                            <label class="col-md-6 col-form-label text-md-end">Защита от спама</label>
                                            <span class="md-3">{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>
                                        <input id="captcha" type="text" class="form-control"
                                               placeholder="Введите ответ" name="captcha">
                                        @error('captcha')
                                        <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                    {{--                                    </div>--}}
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-up">
                                            <input type="submit" value="Отправить комментарий"
                                                   class="btn btn-warning">
                                        </div>
                                    </div>
                                </form>
                            </section>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
