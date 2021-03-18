<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a data-tippy="Sair" href="../Controllers/controllerKillSession.php"><i class="fas fa-power-off"></i></a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!--a href="index3.html" class="brand-link">
    <img src="dist/img/intranex2.png" alt="AdminLTE Logo" class="brand-image">
    <span class="brand-text font-weight-light">Intranex</span>
    </a>-->
    <!-- <img src="" class="brand-link img-fluid" alt="Responsive image"> -->
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="dashboardCrud.php" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Home</p></a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-wpforms"></i>
                        <p>Cadastros<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="listaCargo.php" class="nav-link">
                            <i class="nav-icon fas fa-briefcase"></i><p>Cargo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="listaGerencia.php" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i><p>Gerente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="listaSetor.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i><p>Setor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="listaUsuario.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i><p>Usuário</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Configuração<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-foueview">
                            <a href="cadLogin.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i><p>Cadastrar login</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="Controllers/controllerKillSession.php?cod=1" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Sair</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>