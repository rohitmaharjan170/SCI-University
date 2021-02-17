@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper page-breadcrumb">
        <!--sllider image starts here-->
        <div class="text-center">
            <img src="{{asset('frontend/images/projects.jpg')}}">

        </div>
        <div class="breadcrumb-overlay">
            <h4>{{$lang === 'fr' ? $program->title_fr : $program->title_en}}</h4>
            <h6 class="text-sm-heading">
                <i class="fas fa-calendar-alt text-orange"></i> {{formatDate($program->created_at)}}
                {{--                <i class="fas fa-clock text-orange"></i> 12:40 PM-03:00 PM--}}
            </h6>
        </div>
        <!--sllider image starts here-->
    </section>
    <section class="section-paddings bg-off-white">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-8 blog-details">
                    <div class="details-img">
                        <img src="{{$program->getImagePathAttribute()}}">
                    </div>

                    <div class="blog-info">
                        {!! $lang   === 'fr' ? $program->description_fr : $program->description_en !!}
                        <hr>
                        <div class="col-md-12 blog-details">
                            <h5>{{__('text.related_courses_title')}}</h5>
                            <div class="row">
                                @foreach($program->courses as $course)
                                    <div class="col-md-6 mb-2">
                                        <a href="{{route('course.show',$course->slug)}}">
                                            <img class="card-img-top" src="{{$course->getImagePathAttribute()}}"
                                                 width="420px">
                                            <div class="card-title text-center">
                                                <p>{{ $lang === 'fr' ? $course->title_fr : $course->title_en }}</p>
                                            </div>
                                            <div class="card-body">
                                                {!! $lang === 'fr' ? $course->short_description_fr : $course->short_description_en !!}
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_pinterest"></a>
                        </div>
                        <div class="post-tags">
                            <strong>Tags:</strong>
                            @foreach($program->tags as $tag)
                                <a href="#">{{$tag->name}}</a>
                            @endforeach
                        </div>

                        <div class="blog-footer-social">
                            <span>Share</span>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_email"></a>
                                <a class="a2a_button_pinterest"></a>
                                <a class="a2a_button_facebook_messenger"></a>
                                <a class="a2a_button_linkedin"></a>
                            </div>
                        </div>

                        <div class="comment-form bg-white p-a-10">
                            <script async defer crossorigin="anonymous"
                                    src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=374327223100143&autoLogAppEvents=1"
                                    nonce="sbaXB0df"></script>
                            <div class="fb-comments" data-href="{{url()->current()}}" data-numposts="5"
                                 data-width="100%"></div>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">

                        {{--                        <form action="#">--}}
                        {{--                            <div class="input-group mb-3">--}}
                        {{--                                <input type="text" class="form-control" placeholder="Search">--}}
                        {{--                                <div class="input-group-append">--}}
                        {{--                                    <span class="input-group-text bg-evergreen">Go</span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <!--<div class="search-form">--}}
                        {{--                                <div class="input-group">--}}
                        {{--                                    <input type="text" class="form-control" placeholder="Search…">--}}
                        {{--                                    <span class="input-group-btn">--}}
                        {{--                                        <button type="button" class="btn btn-default evergreen-primary">Go</button>--}}
                        {{--                                    </span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>-->--}}
                        {{--                        </form>--}}

                        {{--                        <div class="sidebar-widget">--}}
                        {{--                            <h4 class="category-title">Popular Category</h4>--}}
                        {{--                            <ul class="sidebar-list">--}}
                        {{--                                <li><a href="#">Business <span>(8)</span></a></li>--}}
                        {{--                                <li><a href="#">Idea &amp; Tips  <span>(8)</span></a></li>--}}
                        {{--                                <li><a href="#">Languages  <span>(8)</span></a></li>--}}
                        {{--                                <li><a href="#">Laarning  <span>(8)</span></a></li>--}}
                        {{--                                <li><a href="#">Smart  <span>(8)</span></a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}

                        <div class="sidebar-widget">
                            <h4 class="category-title">Recent Programs </h4>
                            @foreach($recentPrograms as $rp)
                                <div class="blog-item border-bottom">
                                    <a href="{{route('programs.show',$rp->slug)}}">

                                        <div class="post-thumb"><img
                                                    src="{{$rp->getImagePathAttribute()}}" class="img-responsive"
                                                    alt=""></div>
<<<<<<< HEAD
                                        <div class="blog-detail">
                                            <h4>{!! limitStringByLength($lang === 'fr' ? $rp->short_description_fr : $rp->short_description_en,80) !!}</h4>
                                    </a>
                                    <div class="post-info">{{formatDate($rp->created_at)}}</div>
                                    <P>Sano Sansaar is the world leading company Sano Sansaar is the world leading
                                        company
                                        Sano Sansaar is the world leading companySano Sansaar is the world leading
                                        companySano Sansaar is the world leading companySano Sansaar is the world
                                        leading company Sano Sansaar is the world leading companySano Sansaar is the
                                        world leading company
                                    </P>
=======
                                    <div class="blog-detail">
                                            <h4>{!! limitStringByLength($lang === 'fr' ? $rp->title_fr : $rp->title_en,80) !!}</h4>
                                        </a>
                                        <div class="post-info">{{formatDate($rp->created_at)}}</div>
                                    {!! limitStringByLength($lang === 'fr' ? $rp->short_description_fr : $rp->short_description_en,80) !!}

                                </div>
>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
@push('scripts')
<<<<<<< HEAD
    {{--    <script>
            $(document).ready(function () {
                var pageUrl = encodeURIComponent(document.URL);
                $(".fa-facebook-f").on("click", function () {
                    url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
                    socialWindow(url);
                });
                $(".fa-twitter").on("click", function () {
                    console.log('twitter clicked');
                    url = "https://twitter.com/intent/tweet?url=" + pageUrl;
                    socialWindow(url);
                });

                function socialWindow(url) {
                    window.open(url, 'popup', 'height=600,width=600');
                }
            });

        </script>--}}

    <script>
        var a2a_config = a2a_config || {};
        a2a_config.num_services = 4;
    </script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
=======
    <script async src="{{asset('frontend/js/addtoany-share-button.js')}}"></script>
>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
@endpush