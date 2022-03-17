@extends('personal.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Личный кабинет</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Личный кабинет</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $data['personalArticlesCount'] }}</h3>
                                <p>Свои статьи</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-clipboard"></i>
                            </div>
                            <a href="{{ route('personal.article.index') }}" class="small-box-footer">
                                Подробнее
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $data['commentsCount'] }}</h3>
                                <p>Свои комментарии</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            {{--                            <a href="{{ route('personal.post.index') }}" class="small-box-footer">Подробнее <i--}}
                            {{--                                    class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $data['personalArticlesCount'] }}</h3>
                                <p>Любимые авторы</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <a href="{{ route('personal.subscription.index') }}" class="small-box-footer">
                                Подробнее
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $data['personalArticlesCount'] }}</h3>
                                <p>Подписчики</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <a href="{{ route('personal.subscriber.index') }}" class="small-box-footer">
                                Подробнее
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
