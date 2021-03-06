@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $article->title }}</h1>
                        @if(auth()->user()->can('show articles'))
                            <div>
                                <a href="{{ route('article.show', $article->id) }}" class="mr-2">
                                <i class="far fa-eye"></i>
                                </a>
                            </div>
                        @endif
                        @if(auth()->user()->can('edit articles'))
                            <a href="{{ route('admin.article.edit', $article->id) }}" class="text-success mr-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endif
                        @if(auth()->user()->can('delete articles'))
                            <form action="{{ route('admin.article.delete', $article->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-danger" role="button"></i>
                                </button>
                            </form>
                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Статьи</a></li>
                            <li class="breadcrumb-item active">Карточка</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $article->id }}</td>
                                </tr>
                                <tr>
                                    <td>Заголовок</td>
                                    <td>{{ $article->title }}</td>
                                </tr>
                                <tr>
                                    <td>Описание</td>
                                    <td>{{ $article->description }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
