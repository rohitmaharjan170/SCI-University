<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('student.dashboard')}}" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{SiteSettings('website_name') ?? 'SCI' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('student.dashboard')}}"
                       class="nav-link {{Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.course.list')}}"
                       class="nav-link {{Request::segment(2) == 'course' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Course Enrolled
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.test')}}"
                       class="nav-link {{Request::segment(2) == 'test' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Take Test
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.all.result')}}"
                       class="nav-link {{Request::segment(2) == 'result' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file-alt "></i>
                        <p>
                            View Test Results
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.chat')}}"
                       class="nav-link {{Request::segment(2) == 'chat' ? 'active' : ''}}">
                        <i class="nav-icon fab fa-facebook-messenger"></i>
                        <p>
                            Send Message
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.career')}}"
                       class="nav-link {{Request::segment(2) == 'career' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Recent Career
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
