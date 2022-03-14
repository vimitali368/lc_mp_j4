@extends('personal.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('personal.user.show', $user->id) }}">Персональные
                                    данные</a></li>
                            <li class="breadcrumb-item active">Редактирование данных</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('personal.user.update', $user->id) }}" method="POST" class="w-25">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Имя пользователя</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Введите имя" value="{{ $user->name }}">
                        @error('name')
                        <div class="text-danger">Это поле необходимо для заполнения</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email почта</label>
                        <input type="text" readonly class="form-control" id="email" name="email"
                               placeholder="Ваша почта" value="{{ $user->email }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Роль пользователя</label>
                        <select class="form-control" name="role_ids[]" readonly>
                            @foreach($user->roles as $role)
                                <option value="{{ $role->id }} selected"
                                >{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_ids')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Обновить">
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
