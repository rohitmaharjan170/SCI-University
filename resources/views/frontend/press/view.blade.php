@extends('frontend.layouts.app')

@section('content')
    <!-- <section class="body-wrapper page-breadcrumb">
        <img src="{{asset('frontend/images/projects.jpg')}}">
        <div class="breadcrumb-full-overlay">
            <h4>The Expenses You Are Thinking</h4>
        </div>
    </section> -->
    <section class="section-paddings bg-off-white">
        <div class="container">
            <div class="row mt-5 ">
                <div class="col-md-8 blog-details">
                    <div class="details-img mb-4">
                        <img src="{{$press->getImagePathAttribute()}}">

                    </div>
                    <h6 class="text-sm-heading">
                        <i class="fas fa-calendar-alt text-orange"></i> {{formatDate($press->published_date)}}
                        {{--                        <i class="fas fa-clock text-orange"></i> 12:40 PM-03:00 PM--}}
                    </h6>
                    <h4>{{$press->title_en}}</h4>

                    <div class="blog-info">
                        {!! $press->long_description_en !!}
                        <div class="blog-footer-social">
                            <span>Share</span>
<<<<<<< HEAD
                            <!--                            <ul class="list-inline social">
                                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                            <li><a href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fab fa-pinterest"></i></a></li>
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
                            @foreach($recentPress as $rp)
                                <div class="blog-item border-bottom">
                                    <div class="post-thumb"><a href="{{route('press.show',$rp->slug)}}"><img
                                                    src="{{$rp->getImagePathAttribute()}}"
                                                    class="img-responsive" alt=""></a></div>
                                    <div class="blog-detail">
                                        <a href="{{ route('press.show',$rp->slug)}}">
                                            <h4>{!! limitStringByLength($rp->short_description_en,80) !!}</h4></a>
                                        <div class="post-info">Aug 10 2016</div>
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