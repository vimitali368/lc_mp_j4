@extends('personal.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">Пользователь {{ $reader->name }}</h1>
{{--                        <a href="{{ route('personal.category.edit', $reader->id) }}" class="text-success">--}}
{{--                            <i class="fas fa-pencil-alt"></i>--}}
{{--                        </a>--}}
{{--                        <form action="{{ route('personal.category.delete', $reader->id) }}"--}}
{{--                              method="POST">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="border-0 bg-transparent">--}}
{{--                                <i class="fas fa-trash text-danger" role="button"></i>--}}
{{--                            </button>--}}
{{--                        </form>--}}

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Личный кабинет</a></li>
                            <li class="breadcrumb-item active">Пользователи / {{ $reader->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $reader->id }}</td>
                                </tr>
                                <tr>
                                    <td>Имя</td>
                                    <td>{{ $reader->name }}</td>
                                </tr>
                                <tr>
                                    <td>Статей</td>
                                    <td>{{ $reader->articles()->count() }}</td>
                                </tr>
                                <tr>
                                    <td>Комментариев</td>
                                    <td>{{ $reader->comments()->count() }}</td>
                                </tr>
                                <tr>
                                    <td>Любимых авторов</td>
                                    <td>{{ $reader->subscribedAuthors()->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
