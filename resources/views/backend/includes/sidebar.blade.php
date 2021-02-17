<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
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
                    <a href="{{route('admin.dashboard')}}"
                       class="nav-link {{Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.manage.index')}}"
                           class="nav-link {{Request::segment(2) === 'manage' ? 'active' : '' }}">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Admin Management</p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('banner-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.banner.index')}}"
                           class="nav-link {{Request::segment(2) == 'banner' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>
                                Banner
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('banner-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.advertisement.index')}}"
                           class="nav-link {{Request::segment(2) == 'advertisement' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-paper-plane"></i>
                            <p>
                                Advertisement
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('course-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.course.index')}}"
                           class="nav-link {{Request::segment(2) == 'course' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Course
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('category-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.category.index')}}"
                           class="nav-link {{Request::segment(2) == 'category' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('program-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.program.index')}}"
                           class="nav-link {{Request::segment(2) == 'program' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-shapes"></i>
                            <p>
                                Programs
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('training-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.training.index')}}"
                           class="nav-link {{Request::segment(2) == 'training' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-running"></i>
                            <p>
                                Trainings
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('video-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.video.index')}}"
                           class="nav-link {{Request::segment(2) == 'video' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-video"></i>
                            <p>
                                Videos
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('press-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.press.index')}}"
                           class="nav-link {{Request::segment(2) == 'press' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Press
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('event-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.event.index')}}"
                           class="nav-link {{Request::segment(2) == 'event' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-calendar-week"></i>
                            <p>
                                Event
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('notice-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.notice.index')}}"
                           class="nav-link {{Request::segment(2) == 'notice' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Notice
                            </p>
                        </a>
                    </li>
                @endif
{{--                @if(auth('admin')->user()->can('notice-list') OR auth('admin')->user()->is_super)--}}
                    <li class="nav-item">
                        <a href="{{route('admin.featuredstudent.index')}}"
                           class="nav-link {{Request::segment(2) == 'featuredstudent' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Featured Student
                            </p>
                        </a>
                    </li>
{{--                @endif--}}
                @if(auth('admin')->user()->can('gallery-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.gallery.index')}}"
                           class="nav-link {{Request::segment(2) == 'gallery' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-calendar-week"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                @endif
{{--                @if(auth('admin')->user()->can('gallery-list') OR auth('admin')->user()->is_super)--}}
                    <li class="nav-item">
                        <a href="{{route('admin.donation.index')}}"
                           class="nav-link {{Request::segment(2) == 'donation' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Donations
                            </p>
                        </a>
                    </li>
{{--                @endif--}}
                @if(auth('admin')->user()->can('gallery-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.deanmessage.index')}}"
                           class="nav-link {{Request::segment(2) == 'dean-message' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-comment-dots"></i>
                            <p>
                                Dean Message
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('career-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.career.index')}}"
                           class="nav-link {{Request::segment(2) == 'career' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-suitcase"></i>
                            <p>
                                Career
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('partner-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.partner.index')}}"
                           class="nav-link {{Request::segment(2) == 'partner' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>
                                Partner
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('associate-project-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.companyassociate.index')}}"
                           class="nav-link {{Request::segment(2) == 'company-associate' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Company Associate Project
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('franchise-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.franchise.index')}}"
                           class="nav-link {{Request::segment(2) == 'franchise' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-code-branch"></i>
                            <p>
                                Franchise
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('team-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.team.index')}}"
                           class="nav-link {{Request::segment(2) == 'team' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Team
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('trainer-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.trainer.index')}}"
                           class="nav-link {{Request::segment(2) == 'trainer' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Trainer
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('contact-messages-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.contact.index')}}"
                           class="nav-link {{Request::segment(2) == 'contact' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Contact Messages
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('exam-list') OR auth('admin')->user()->can('question-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item has-treeview {{Request::segment(2) === 'exam' || Request::segment(2) === 'question' || Request::segment(2) === 'result' ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                Exam
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(auth('admin')->user()->can('exam-list') OR auth('admin')->user()->is_super)
                                <li class="nav-item">
                                    <a href="{{route('admin.exam.index')}}"
                                       class="nav-link {{Request::segment(2) === 'exam' ? 'active' : '' }}">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Add Exams</p>
                                    </a>
                                </li>
                            @endif
                            @if(auth('admin')->user()->can('question-list') OR auth('admin')->user()->is_super)
                                <li class="nav-item">
                                    <a href="{{route('admin.question.index')}}"
                                       class="nav-link {{Request::segment(2) === 'question' ? 'active' : '' }}">
                                        <i class="fas fa-question-circle nav-icon"></i>
                                        <p>Add Questions</p>
                                    </a>
                                </li>
                            @endif
                                <li class="nav-item">
                                    <a href="{{route('admin.result.index')}}"
                                       class="nav-link {{Request::segment(2) === 'result' ? 'active' : '' }}">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Result</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                @endif
                @if(auth('admin')->user()->can('scholarship-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.scholarship.index')}}"
                           class="nav-link {{Request::segment(2) == 'scholarship' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Scholarship
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('admission-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.admission.index')}}"
                           class="nav-link {{Request::segment(2) == 'admission' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Admission
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('testimonial-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.testimonial.index')}}"
                           class="nav-link {{Request::segment(2) == 'testimonial' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Testimonial
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('bod-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.bod.index')}}"
                           class="nav-link {{Request::segment(2) == 'bod' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-calendar-week"></i>
                            <p>
                                Board Of Directors
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('tags-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.tags.index')}}"
                           class="nav-link {{Request::segment(2) == 'tags' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Tags
                            </p>
                        </a>
                    </li>
                @endif
                @if(auth('admin')->user()->can('cms-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item has-treeview {{Request::segment(2) == 'cms' ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-swatchbook"></i>
                            <p>
                                Content Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.cms.index','terms_and_conditions')}}"
                                   class="nav-link {{request()->path() == 'admin/cms/terms_and_conditions' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Terms & Conditions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.cms.index','privacy_policy')}}"
                                   class="nav-link {{request()->path() == 'admin/cms/privacy_policy' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Privacy Policy</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.cms.index','about_us')}}"
                                   class="nav-link {{request()->path() == 'admin/cms/about_us' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>About Us</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.cms.index','contact_us')}}"
                                   class="nav-link {{request()->path() == 'admin/cms/contact_us' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contact Us</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(auth('admin')->user()->can('site-settings-list') OR auth('admin')->user()->is_super)
                    <li class="nav-item">
                        <a href="{{route('admin.sitesettings.index')}}"
                           class="nav-link {{Request::segment(2) == 'site-settings' ? 'active' : ''}}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Site Settings
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
