<header>
    <div class="header-area ">
        <div class="header__top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-xl-3 col-lg-3 logo-img">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('frontend/images/logos.png')}}" alt="">
                            <h5 style="margin-bottom: 0;margin-top:10px;">SCI Education USA</h5>
                            <h5 style="margin-top: 0;color: #e17b2b;    font-size: 18px;}">University</h5>
                        </a>
                    </div>
                    <div class="float-left top-items col-md-9">
                        <div class="email-head border-right">
                            <i class="fas fa-envelope-open"></i>
                            <div class="email-right">
                                <span>{{__('text.email_us_at')}}</span>
                                <a href="#" title="Email Us">{{SiteSettings('primary_email')}}</a>
                            </div>
                        </div>
                        <div class="email-head border-right">
                            <i class="fas fa-phone"></i>
                            <div class="email-right">
                                <span>{{__('text.contact_us_at')}}</span>
                                <a href="#" title="Contat Us">{{SiteSettings('primary_mobile')}}</a>
                            </div>
                        </div>
                        <div class="email-head language-switch ">
                            <div class="email-right">
                                                        <span>Choose Language</span>

                            <a href="{{route('lang','en')}}"> <img class="fav-icon"
                                                                   src="{{asset('frontend/images/icons8-usa-48.png')}}"></a>
                            <a href="{{route('lang','fr')}}"> <img class="fav-icon"
                                                                   src="{{asset('frontend/images/france.png')}}"></a>
                            {{-- <div class="text-center">
                                 <span></span>
                                 <a href="#">{{__('text.language')}}</a>
                             </div>--}}
                         </div>
                        </div>
                        <ul class="cart-div ">
                            <li>
                                <a href="{{ route('donation.index') }}">
                                    <button class="btn btn-danger btn-rounded ">
                                        <i class="fas fa-hand-holding-usd p-r-5"></i> {{__('text.donate')}}
                                    </button>
                                </a>
                            </li>
                            @if(Auth::guard('trainer')->check())
                                <li>
                                    <a href="{{ route('trainer.dashboard') }}">
                                        <button class="btn btn-success btn-rounded ">
                                            <i class="fas fa-user p-r-5"></i>{{__('text.trainer_dashboard')}}
                                        </button>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::guard('student')->check())
                                <li>
                                    <a href="{{ route('student.dashboard') }}">
                                        <button class="btn btn-success btn-rounded ">
                                            <i class="fas fa-user p-r-5"></i>{{__('text.student_dashboard')}}
                                        </button>
                                    </a>
                                </li>
                            @endif
                            @if(!Auth::guard('trainer')->check() && !Auth::guard('student')->check())
                                <li>
                                    <a href="{{ route('login') }}">
                                        <button class="btn btn-warning btn-rounded ">
                                            <i class="fas fa-sign-in-alt p-r-5"></i> {{__('text.login')}}
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="/register">
                                        <button class="btn btn-outline-warning btn-rounded ">
                                            <i class="fas fa-user p-r-5"></i> Signup
                                        </button>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('school.logout') }}">
                                        <button class="btn btn-warning btn-rounded ">
                                            <i class="fas fa-user p-r-5"></i> {{__('text.logout')}}
                                        </button>
                                    </a>
                                </li>
                            @endif

                           <!--  <li>
=======
>>>>>>> 400280b6a577407a53170661fbff71f0c85a23fe
                                <a href="{{ route('admission') }}">
                                    <button class="btn btn-primary btn-rounded ">
                                        <i class="fas fa-user p-r-5"></i> {{__('text.apply_now')}}
                                    </button>
                                </a>
                            </li> -->
                        </ul>

                    </div>
                </div>

            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row  no-gutters">
                    <div class="col-md-3  display-sm sticky-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('frontend/images/logos.png')}}" alt="">
                            <h5>SCI Education USA</h5>
                        </a>

                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation" class="menu-navigation">
                                    <li class="nav-item dropdown"><a href="{{ route('home') }}"
                                           class="{{Route::current()->getName() == 'home' ? 'active' : '' }}">{{__('text.home')}} </a>

                                           <ul class="drop">
                                            <li><a href="{{ route('about-us')}}"> About Us</a></li>
                                             <li><a href="{{ route('bod') }}">Academic Board</a></li>
                                              <li><a href="{{ route('team') }}"> Administrative Staff</a></li>
                                               <li><a href="{{route('career')}}">Carreer</a></li>
                                           </ul>
                                    </li>


   <li class="nav-item dropdown"><a href="#"
                                           class="{{Route::current()->getName() == 'Faculty' ? 'active' : '' }}">{{__('text.Faculty')}} </a>

                                           <ul class="drop">
                                            <li><a href="{{ route('resident') }}">Resident Professors</a></li>
                                             <li><a href="{{ route('visiting') }}">Visiting Professors</a></li>
                                              <li><a href="{{ route('consultant') }}">Consultants</a></li>
                                               <li><a href="{{ route('instructor') }}">Instructors</a></li>
                                           </ul>
                                    </li>

                                    <li class="nav-item dropdown"><a href="#"
                                                                     class="{{Route::current()->getName() == 'programs' ? 'active' : '' }}">{{__('text.academic_units')}} </a>
                                
                                           <ul class="drop">
                                            <li><a href="{{ route('programs') }}">{{__('text.programs')}}</a></li>
                                             
                                            <li><a href="{{ route('trainings') }}">{{__('text.trainings')}}</a></li>
                                           </ul>
                                    </li>
                                    
                                    <li class="nav-item dropdown"><a href="#"
                                           class="{{Route::current()->getName() == 'trainings' ? 'active' : '' }}">{{__('text.scholarship')}} </a>
                                           <ul class="drop">
                                            <li><a href="acreditation"> Apply for Scholarship</a></li>
                                            
                                           </ul>
                                    </li>

                                    <li class="nav-item dropdown"><a href="#"
                                           class="{{Route::current()->getName() == 'projects' ? 'active' : '' }}">{{__('text.registration')}} </a>
                                   <ul class="drop">
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                             
                                        
                                           </ul>
                                    </li>
                                    <li class="nav-item dropdown"><a href="#"
                                           class="{{Route::current()->getName() == 'gallery' ? 'active' : '' }}">{{__('text.library')}} </a>
                                     <ul class="drop">
                                            <li><a href="http://lyceex.com" target="_blank" > Online Libary</a></li>
                                            
                                           </ul>
                                    </li>
                                    <li class="nav-item dropdown"><a href="#"
                                           class="{{Route::current()->getName() == 'events' ? 'active' : '' }}">{{__('text.research')}} </a>
                                  
 <ul class="drop">
                                            <li><a href="{{ route('projects') }}"> Projects</a></li>
                                            
                                           </ul>
                                    </li>
                                    <li class="nav-item dropdown"><a href="#"
                                           class="{{Route::current()->getName() == 'team' ? 'active' : '' }}">{{__('text.publications')}} </a>
                                     <ul class="drop">
                                            <li><a href="{{ route('gallery') }}"> Gallery</a></li>
                                                <li><a href="{{ route('events') }}"> Events</a></li>
                                              <li><a href="{{ route('press') }}"> Press</a></li> 
                                                        <li><a href="{{ route('videos') }}"> Video</a></li>
                                            
                                           </ul>
                                    </li>

                                    <li><a href="#"
                                           class="{{Route::current()->getName() == 'board-of-directors' ? 'active' : '' }}">{{__('text.alumni')}} </a>
                                    </li>
                                   
                                   
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end
