<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Платформа "Воко"</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ auth()->user()->hasRole('administrator-user') ? 'Админ' : '' }}
                    {{ auth()->user()->hasRole('editor-user') ? 'Редактор' : '' }}
                    {{ auth()->user()->hasRole('author-user') ? 'Писатель' : '' }}
                    {{ auth()->user()->hasRole('reader-user') ? 'Читатель' : '' }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(!auth()->user()->hasRole('reader-user'))
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Категории
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.tag.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Тэги
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('admin.article.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Статьи
                        </p>
                    </a>
                </li>
                @if(auth()->user()->hasRole('administrator-user'))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Статистика
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{ route('admin.statistics.author') }}" class="nav-link">
                                    <i class="nav-icon fas fa-pen"></i>
                                    <p>
                                        Писатели
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.statistics.reader') }}" class="nav-link">
                                    <i class="nav-icon fas fa-glasses"></i>
                                    <p>Читатели</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
