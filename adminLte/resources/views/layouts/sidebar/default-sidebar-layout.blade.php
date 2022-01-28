<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @auth()
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name }}</a>
            </div>
            @endauth
            @guest()
                    <div class="info">
                        <a href="{{ route('login') }}" class="d-block">Войти</a>
                    </div>
                    <div class="info">
                        <a href="{{ route('register') }}" class="d-block">Регистрация</a>
                    </div>
            @endguest
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ 'home' }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-industry"></i>
                        <p>
                            Компании
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('companiesList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Показать все</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('companyCreate') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить компанию</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Клиенты
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customersList') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Показать всех</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customerCreate') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить клиента</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
