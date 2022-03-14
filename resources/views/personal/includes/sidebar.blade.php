<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('personal.main.index') }}" class="d-block">
                    {{ auth()->user()->name }}
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('personal.main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Личный кабинет
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.user.show', auth()->user()->id) }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Персональные данные
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.user.change-password', auth()->user()->id) }}" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Смена пароля
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
