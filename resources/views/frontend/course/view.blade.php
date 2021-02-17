@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper page-breadcrumb">
        <!--sllider image starts here-->
        <img src="{{asset('frontend/images/projects.jpg')}}">
        <div class="breadcrumb-overlay">
            <h4>{{$course->title_en}}</h4>
            <h6 class="text-sm-heading">
                <i class="fas fa-calendar-alt text-orange"></i> {{formatDate($course->created_at)}}
                {{--                <i class="fas fa-clock text-orange"></i> 12:40 PM-03:00 PM--}}
            </h6>
        </div>
        <!--sllider image starts here-->
    </section>
    <section class="section-paddings bg-off-white">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 blog-details">
                    <h4>{{$course->title_en}}</h4>

                    <div class="row mt-3 mb-3">
                        <div class="col-md-4 course-features border-right">
                            {{--                                <img src="{{$trainer->getImagePathAttribute()}}">--}}
                            <h6 class="text-orange">TEACHER</h6>
                            <p>{{$course->trainer ? $course->trainer->getFullNameAttribute() : null}}</p>
                        </div>

                        <div class="col-md-4 course-features">
                            <h6 class="text-orange">RATING</h6>
                            <p class="text-orange">
                                <i class="fas fa-star"></i> <span style="font-size:15px">{{$course->rating}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="details-img mb-4">
                        <img src="{{$course->getImagePathAttribute()}}">

                    </div>
               


                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="course-summary">
                            <div class="course-head">
                                <h5>PRICE: ${{$course->price}}</h5>
                            </div>
                            <div class="course-body">
                                <ul>
                                    <li>{{$totalEnrolledStudents}} Students Enrolled</li>
                                    <li> Discount: {{$course->discount}} </li>
                                    <li> Rating: <i class="fas fa-star"></i> {{$course->rating}}</li>
                                    <li> Certificate of Completion</li>
                                </ul>
                            </div>
                            <div class="course-footer">
                                <a href="{{route('purchase.course',$course->slug)}}"><h5>BUY COURSE</h5></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h4 class="category-title">Recent Course</h4>
                            @foreach($recentCourse as $c)
                                <div class="blog-item border-bottom">
                                    <div class="post-thumb"><a href="{{route('course.show',$c->slug)}}"><img
                                                    src="{{$c->getImagePathAttribute()}}"
                                                    class="img-responsive"
                                                    alt=""></a></div>
                                    <div class="blog-detail">
                                        <a href="{{route('course.show',$c->slug)}}"><h4>{{$course->title_en}}</h4></a>
                                        <div class="post-info">{{formatDate($c->created_at)}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-paddings bg-off-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 comment-form bg-white p-a-10">
                    <script async defer crossorigin="anonymous"
                            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=374327223100143&autoLogAppEvents=1"
                            nonce="sbaXB0df"></script>
                    <div class="fb-comments" data-href="{{url()->current()}}" data-numposts="5" data-width="100%"></div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script async src="{{asset('frontend/js/addtoany-share-button.js')}}"></script>
@endpush