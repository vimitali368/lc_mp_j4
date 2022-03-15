@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование статьи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Статьи</a></li>
                            <li class="breadcrumb-item active">Редактирование</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.article.update', $article->id ) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control w-25" name="title" placeholder="Заголовок"
                               value="{{ $article->title }}">
                        @error('title')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Описание"
                               value="{{ $article->description ?? old('description') }}">
                        @error('description')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-100">
                        <textarea id="summernote" name="content" placeholder="Сожержимое статьи">
                            {{ $article->content ?? old('content') }}
                        </textarea>
                        @error('content')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label>Изображение для статьи</label>
                        @if(isset($article->preview_image))
                            <div class="w-25">
                                <img src="{{ $article->preview_image }}" alt="preview_image"
                                     class="w-50">
                            </div>
                        @endif
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Выберите категорию</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $article->category_id ? ' selected' : '' }}
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Тэги</label>
                        <select class="select2" multiple="multiple" data-placeholder="Выберите тэги"
                                style="width: 100%;" name="tag_ids[]">
                            @foreach($tags as $tag)
                                <option
                                    {{ is_array( $article->tags->pluck('id')->toArray() ) && in_array($tag->id, $article->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                        @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
