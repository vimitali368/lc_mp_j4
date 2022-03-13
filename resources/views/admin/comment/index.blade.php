@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Комментарии</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th colspan="3" class="text-center">Действия</th>
                                    <th>Сообщение</th>
                                    <th>ID пользователя</th>
                                    <th>ID статьи</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        @if(auth()->user()->can('edit comments'))
                                            <td class="text-center"><a
                                                    href="{{ route('admin.comment.edit', $comment->id) }}"
                                                    class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        @endif
                                        @if(auth()->user()->can('delete comments'))
                                            <td class="text-center">
                                                <form action="{{ route('admin.comment.delete', $comment->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                        @if(auth()->user()->can('ban commentators'))
                                            <td class="text-center">
                                                <a href="{{ route('admin.user.ban', $comment->user_id) }}"
                                                   @if($comment->user->isBanned())
                                                   title="Забанить"
                                                   class="text-success">
                                                    <i class="fas fa-comment"></i>
                                                    @else
                                                        title="Разбанить"
                                                        class="text-danger">
                                                        <i class="fas fa-comment-slash"></i>
                                                    @endif
                                                </a>
                                            </td>
                                        @endif
                                        <td>{{ $comment->message }}</td>
                                        <td>{{ $comment->user_id }}</td>
                                        <td>{{ $comment->article_id }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
