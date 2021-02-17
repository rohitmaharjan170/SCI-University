@extends('frontend.layouts.app')
@section('content')
<<<<<<< HEAD
    <!--sllider image starts here-->
    <!--
=======
        <!--sllider image starts here-->
        <!--
>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
            <section class="body-wrapper page-breadcrumb">

                <div class="text-center">

        <img src="{{asset('frontend/images/projects.jpg')}}">
        </div>
        <div class="breadcrumb-overlay">
            <h4>{{$lang === 'fr' ? $event->title_fr : $event->title_en}}</h4>
            <h6 class="text-sm-heading">
                <i class="fas fa-calendar-alt text-orange"></i> {{formatDate($event->created_at)}}
            </h6>
        </div>
            </section>
 -->
    <!--sllider image starts here-->
    <section class="section-paddings bg-off-white">
        <div class="container">
            <div class="row mt-5 ">
                <div class="col-md-8 blog-details">
                    <div class="details-img">
                        <img src="{{$event->getImagePathAttribute()}}">

                    </div>

                    <div class="blog-info">
                        {!! $lang === 'fr' ? $event->description_fr : $event->description_en !!}
                        <div class="blog-footer-social">
                            <span>Share</span>
<<<<<<< HEAD
                            <!--                            <ul class="list-inline social">
                                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                        </ul>-->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_pinterest"></a>
=======
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_email"></a>
                                <a class="a2a_button_pinterest"></a>
                                <a class="a2a_button_facebook_messenger"></a>
                                <a class="a2a_button_linkedin"></a>
>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
                            </div>
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


                        <div class="sidebar-widget">
                            <h4 class="category-title">Recent Events</h4>
                            @foreach($recentEvents as $re)
                                <div class="blog-item border-bottom">
                                    <div class="post-thumb"><a href="#"><img src="{{$re->getImagePathAttribute()}}"
                                                                             class="img-responsive" alt=""></a></div>
                                    <div class="blog-detail">
<<<<<<< HEAD
                                        <a href="{{route('event.show',$re->slug)}}">
                                            <h4>{{$lang === 'fr' ? $re->title_fr : $re->title_en}}</h4></a>
=======
                                        <a href="{{route('event.show',$re->slug)}}"><h4>{{$lang === 'fr' ? $re->title_fr : $re->title_en}}</h4></a>
                                        <h4>{!! limitStringByLength($lang === 'fr' ? $re->description_fr : $re->description_en,80) !!}</h4>
>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
                                        <div class="post-info">{{ formatDate($re->created_at) }}</div>
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
    <!--    <script>
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
    </script>-->
    <script>
        var a2a_config = a2a_config || {};
        a2a_config.num_services = 4;
    </script>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
=======
    <script async src="{{asset('frontend/js/addtoany-share-button.js')}}"></script>
>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
@endpush