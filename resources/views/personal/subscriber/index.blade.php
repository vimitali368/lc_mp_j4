@extends('personal.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Список подписчиков</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Личный кабинет</a></li>
                            <li class="breadcrumb-item active">Список подписчиков</li>
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
                                    <th>Имя</th>
                                    <th colspan="2" class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td>{{ $subscriber->id }}</td>
                                        <td>{{ $subscriber->name }}</td>
                                        <td class="text-center"><a
                                                href="{{ route('personal.subscriber.show', $subscriber->id) }}">
                                                <i class="far fa-eye" title="Личный кабинет пользователя"></i></a></td>
{{--                                        <td>--}}
{{--                                            <form action="{{ route('personal.subscription.delete', $subscriber->id) }}"--}}
{{--                                                  method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="border-0 bg-transparent">--}}
{{--                                                    <i class="fas fa-trash text-danger" role="button"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
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
