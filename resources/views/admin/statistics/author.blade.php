@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Писатели</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Домой</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.statistics.author') }}">Статистика</a>
                            </li>
                            <li class="breadcrumb-item active">Писатели</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['usersCount'] }}</h3>
                                    <p>Писатели</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                {{--                            <a href="{{ route('admin.user.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $data['articlesCount'] }}</h3>
                                    <p>Статьи</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clipboard"></i>
                                </div>
                                {{--                                --}}{{--                            <a href="{{ route('admin.post.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                            </div>
                        </div>
                        <!-- ./col -->
                    {{--                        <div class="col-lg-3 col-6">--}}
                    <!-- small box -->
                    {{--                            <div class="small-box bg-warning">--}}
                    {{--                                <div class="inner">--}}
                    {{--                                    <h3>{{ $data['categoriesCount'] }}</h3>--}}

                    {{--                                    <p>Категории</p>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="icon">--}}
                    {{--                                    <i class="fas fa-book"></i>--}}
                    {{--                                </div>--}}
                    {{--                                --}}
                    {{--                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <!-- ./col -->
                        {{--                    <div class="col-lg-3 col-6">--}}
                        {{--                        <!-- small box -->--}}
                        {{--                        <div class="small-box bg-danger">--}}
                        {{--                            <div class="inner">--}}
                        {{--                                <h3>{{ $data['tagsCount'] }}</h3>--}}

                        {{--                                <p>Тэги</p>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="icon">--}}
                        {{--                                <i class="fas fa-tags"></i>--}}
                        {{--                            </div>--}}
                        {{--                            <a href="{{ route('admin.tag.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Подробно</h3>
                            </div>

                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                   class="table table-bordered table-hover dataTable dtr-inline"
                                                   aria-describedby="example2_info">
                                                <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example2" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Пользователь: нажмите чтобы отсортировать столбец">
                                                        Пользователь
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Статей: нажмите чтобы отсортировать столбец">
                                                        Статей
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($users as $user)
                                                    <tr>
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $user->name }}</td>
                                                        <td>{{ $user->articles()->count() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mx-auto" style="margin-top: -100px;">
                                            {{ $users->links() }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="example2_info" role="status"
                                                 aria-live="polite">Showing 1 to 10 of 57 entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                 id="example2_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="example2_previous"><a href="#" aria-controls="example2"
                                                                                  data-dt-idx="0" tabindex="0"
                                                                                  class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                                                                    aria-controls="example2"
                                                                                                    data-dt-idx="1"
                                                                                                    tabindex="0"
                                                                                                    class="page-link">1</a>
                                                    </li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="example2"
                                                                                              data-dt-idx="2"
                                                                                              tabindex="0"
                                                                                              class="page-link">2</a>
                                                    </li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="example2"
                                                                                              data-dt-idx="3"
                                                                                              tabindex="0"
                                                                                              class="page-link">3</a>
                                                    </li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="example2"
                                                                                              data-dt-idx="4"
                                                                                              tabindex="0"
                                                                                              class="page-link">4</a>
                                                    </li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="example2"
                                                                                              data-dt-idx="5"
                                                                                              tabindex="0"
                                                                                              class="page-link">5</a>
                                                    </li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="example2"
                                                                                              data-dt-idx="6"
                                                                                              tabindex="0"
                                                                                              class="page-link">6</a>
                                                    </li>
                                                    <li class="paginate_button page-item next" id="example2_next"><a
                                                            href="#" aria-controls="example2" data-dt-idx="7"
                                                            tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
