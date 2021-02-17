@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper page-breadcrumb">
        <!--sllider image starts here-->
        <div class="text-center">
            <img src="{{asset('frontend/images/projects.jpg')}}">
        </div>
        <div class="breadcrumb-overlay">
            <h4>The Expenses You Are Thinking</h4>
        </div>
        <!--sllider image starts here-->
    </section>
    <section class="section-paddings bg-off-white">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-8 blog-details">
                    <div class="details-img mb-4">
                        <img src="{{$project->getImagePathAttribute()}}">

                    </div>
                    <h6 class="text-sm-heading">
                        <i class="fas fa-calendar-alt text-orange"></i> {{formatDate($project->created_at)}}
                        {{--                        <i class="fas fa-clock text-orange"></i> 12:40 PM-03:00 PM--}}
                    </h6>
                    <h4>{{$lang === 'fr' ? $project->title_fr : $project->title_en}}</h4>

                    <div class="blog-info">
                        {!! $lang === 'fr' ? $project->description_fr : $project->description_en !!}
                        <div class="blog-footer-social">
                            <span>Share</span>
                            <ul class="list-inline social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="comment-form bg-white p-a-10">
                        <script async defer crossorigin="anonymous"
                                src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=374327223100143&autoLogAppEvents=1"
                                nonce="sbaXB0df"></script>
                        <div class="fb-comments" data-href="{{url()->current()}}" data-numposts="5" data-width="100%"></div>
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
                            <h4 class="category-title">Recent Projects</h4>
                            @foreach($recentProjects as $rp)
                                <div class="blog-item border-bottom">
                                    <div class="post-thumb"><a href="{{route('project.show',$rp->slug)}}"><img src="{{$rp->getImagePathAttribute()}}"
                                                                             class="img-responsive" alt=""></a></div>
                                    <div class="blog-detail">
                                        <a href="{{ route('project.show',$rp->slug) }}"><h4>{!! limitStringByLength($rp->title_en,80) !!}</h4></a>
                                        <div class="post-info">{{formatDate($rp->created_at)}}</div>
                                        <P>Sano Sansaar is the world leading company Sano Sansaar is the world leading company
                                         Sano Sansaar is the world leading companySano Sansaar is the world leading companySano Sansaar is the world leading companySano Sansaar is the world leading company Sano Sansaar is the world leading companySano Sansaar is the world leading company
                                        </P>


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
    <script>
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
    </script>
@endpush