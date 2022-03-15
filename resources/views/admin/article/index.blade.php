@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Статьи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item active">Статьи / Список</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if(auth()->user()->can('add articles'))
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{ route('admin.article.create') }}" type="button"
                           class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                    <th class="text-center">
                                        @if(auth()->user()->can('edit articles'))
                                            @sortablelink('view_count', 'Просмотры')
                                        @else
                                            Просмотры
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        @if(auth()->user()->can('edit articles'))
                                            @sortablelink('liked_users_count', 'Фавориты')
                                        @else
                                            Фавориты
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        @if(auth()->user()->can('edit articles'))
                                            @sortablelink('comments_count', 'Комментарии')
                                        @else
                                            Комментарии
                                        @endif
                                    </th>
                                    @if(auth()->user()->hasAnyPermission(['show articles', 'edit articles', 'delete articles']))
                                        <th colspan="3" class="text-center">Действия</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td class="text-center">{{ $article->view_count }}</td>
                                        <td class="text-center">{{ $article->liked_users_count }}</td>
                                        <td class="text-center">{{ $article->comments_count }}</td>
                                        @if(auth()->user()->can('show articles'))
                                            <td class="text-center">
                                                <a href="{{ route('admin.article.show', $article->id) }}"><i
                                                        class="far fa-eye"></i></a></td>
                                        @endif
                                        @if(auth()->user()->can('edit articles'))
                                            <td class="text-center">
                                                <a href="{{ route('admin.article.edit', $article->id) }}"
                                                   class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        @endif
                                        @if(auth()->user()->can('delete articles'))
                                            <td>
                                                <form action="{{ route('admin.article.delete', $article->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto">
                            {{--                            {{ $articles->links() }}--}}
                            {{ $articles->appends(\Request::except('page'))->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
