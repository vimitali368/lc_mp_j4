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
                <li class="nav-item">
                    <a href="{{ route('personal.subscriber.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Подписчики
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.like.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                            Фаворитные статьи
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>
                            Любимые авторы
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('personal.subscription.article.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Статьи авторов
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('personal.subscription.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Список авторов</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Свои статьи
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('personal.article.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Список</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('personal.article.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-pen"></i>
                                <p>
                                    Добавить
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
