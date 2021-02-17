<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <div class="dropdown navbar-nav ml-auto">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-power-off"></i></a>
        <div class="dropdown-menu">
            <a href="{{route('student.profile.index')}}" class="dropdown-item"><i class="fas fa-edit"></i> Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a href="{{route('student.profile.changepassword')}}" class="dropdown-item"><i class="fas fa-key"></i> Change Password</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('school.logout') }}" class="dropdown-item">
                <i class="fas fa-power-off"></i>&nbsp;&nbsp;Logout
            </a>
        </div>
    </div>
</nav>
<!-- /.navbar -->