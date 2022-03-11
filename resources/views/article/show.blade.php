@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $article->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i') }} •
                {{ $article->comments->count() }} Комментария
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
            <div class="row">
                <div class="col-lg-9 mx-auto">
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
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label text-md-end">Защита от спама</label>
                                        <div class="form-group">
                                            <div class="captcha">
                                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                    &#x21bb;
                                                </button>
                                                <span class="ml-3">{!! captcha_img() !!}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input id="captcha" type="text" class="form-control"
                                                   placeholder="Введите ответ" name="captcha">
                                            @error('captcha')
                                            <div class=" text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
