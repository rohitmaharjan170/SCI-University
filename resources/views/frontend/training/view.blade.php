@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper page-breadcrumb">
        <!--sllider image starts here-->
        <div class="text-center">
            <img src="{{asset('frontend/images/projects.jpg')}}">
        </div>
        <div class="breadcrumb-overlay">
            <div class="container">
                <h4>{{$training->title_en}}</h4>
                <h6 class="text-sm-heading">
                    <i class="fas fa-calendar-alt text-orange"></i> {{formatDate($training->created_at)}}
                    {{--                <i class="fas fa-clock text-orange"></i> 12:40 PM-03:00 PM--}}
                </h6>
            </div>
        </div>
        <!--sllider image starts here-->
    </section>
    <section class="section-paddings bg-off-white">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 blog-details">

                    @foreach($training->trainers as $trainer)
                        <div class="col-md-4 course-features border-right">
                            {{--                                <img src="{{$trainer->getImagePathAttribute()}}">--}}
                            <h6 class="text-orange">TEACHER</h6>
                            <p>{{$trainer->getFullNameAttribute()}}</p>
                        </div>
                    @endforeach


<<<<<<< HEAD
=======

>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
                    <div class="details-img mb-4">
                        <img src="{{$training->getImagePathAttribute()}}">

                    </div>
                    <h4 class="training-title">{{$training->title_en}}</h4>

                    <div class="row">
                        <div class="col-md-12 course-nav">
                            <!--  <nav>
                                 <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                     <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home"
                                        aria-selected="true">Home</a>
                                     <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Curriculum</a>
                                     <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Instructor</a>
                                     <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about"
                                        role="tab" aria-controls="nav-about" aria-selected="false">Reviews</a>
                                 </div>
                             </nav> -->
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <div class="blog-info">
                                        {!! $lang === 'fr' ? $training->description_fr : $training->description_en !!}
                                        <div class="post-tags">
                                            <strong>Tags:</strong>
                                            @foreach($training->tags as $tag)
                                                <a href="#">{{$tag->name}}</a>
                                            @endforeach
                                        </div>
                                    <!--     <div class=" course-features">
                                                <h6 class="text-orange">REVIEW</h6>
                                                <p class="text-orange">
                                                    <span style="font-size:15px">{{$training->rating}}</span> <i class="fas fa-star"></i>
                                                </p>
                                            </div> -->

                                        <div class="blog-footer-social">
                                            <span>Share</span>
<<<<<<< HEAD
<!--                                            <ul class="list-inline social">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
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

                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    <div class="blog-info">
                                        <blockquote class="margin-top-20 margin-bottom-20">
                                            Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices
                                            pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien
                                            rutrum.
                                        </blockquote>
                                        <div class="row program-details-img">
                                            <div class="col-md-6">
                                                <img src="images/mid-ad.jpg">

                                            </div>
                                            <div class="col-md-6">
                                                <img src="images/mid.jpg">

                                            </div>
                                        </div>

                                        <p>
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                        </p>
                                        <div class="post-tags">
                                            <strong>Tags:</strong>
                                            <a href="#">Groups</a>
                                            <a href="#">Parkings</a>
                                            <a href="#">Spa</a>
                                            <a href="#">Team</a>
                                            <a href="#">Food</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                    <div class="blog-info">
                                        <blockquote class="margin-top-20 margin-bottom-20">
                                            Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices
                                            pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien
                                            rutrum.
                                        </blockquote>
                                        <div class="row program-details-img">
                                            <div class="col-md-6">
                                                <img src="images/mid-ad.jpg">

                                            </div>
                                            <div class="col-md-6">
                                                <img src="images/mid.jpg">

                                            </div>
                                        </div>

                                        <p>
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                        </p>
                                        <div class="post-tags">
                                            <strong>Tags:</strong>
                                            <a href="#">Groups</a>
                                            <a href="#">Parkings</a>
                                            <a href="#">Spa</a>
                                            <a href="#">Team</a>
                                            <a href="#">Food</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-about" role="tabpanel"
                                     aria-labelledby="nav-about-tab">
                                    <div class="blog-info">
                                        <blockquote class="margin-top-20 margin-bottom-20">
                                            Mauris aliquet ultricies ante, non faucibus ante gravida sed. Sed ultrices
                                            pellentesque purus, vulputate volutpat ipsum hendrerit sed neque sed sapien
                                            rutrum.
                                        </blockquote>
                                        <div class="row program-details-img">
                                            <div class="col-md-6">
                                                <img src="images/mid-ad.jpg">

                                            </div>
                                            <div class="col-md-6">
                                                <img src="images/mid.jpg">

                                            </div>
                                        </div>

                                        <p>
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                            Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod
                                            Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam,
                                            Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo
                                            Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit Esse
                                            Cillum Dolore Eu Fugiat Nulla Pariatur. Excepteur Sint Occaecat Cupidatat
                                            Non Proident.
                                        </p>
                                        <div class="post-tags">
                                            <strong>Tags:</strong>
                                            <a href="#">Groups</a>
                                            <a href="#">Parkings</a>
                                            <a href="#">Spa</a>
                                            <a href="#">Team</a>
                                            <a href="#">Food</a>
                                        </div>
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
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="course-summary">
                            <div class="course-head">
                                <h5>PRICE: ${{$training->price}}</h5>
                            </div>
                            <div class="course-body">
                                <ul>
                                    <li>{{$totalEnrolledStudents}} Students Enrolled</li>
                                    <li> Language: English</li>
                                    <li> Discount: {{$training->discount}} %</li>
                                    <li> Rating: <i class="fas fa-star"></i> {{$training->rating}}</li>
                                    <li> Certificate of Completion</li>
                                </ul>
                            </div>
                            <div class="course-footer">
                                <h5><a href="{{route('purchase.training',$training->slug)}}">Enroll Training</a></h5>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h4 class="category-title">Recent Trainings</h4>
                            @foreach($recentTraining as $t)
                                <div class="blog-item border-bottom">
                                    <div class="post-thumb">
                                        <a href="{{route('training.show',$t->slug)}}">
                                            <img src="{{$t->getImagePathAttribute()}}"
                                                 class="img-responsive"
                                                 alt=""></div>
                                    <div class="blog-detail">
                                        <a href="{{route('training.show',$t->slug)}}">
                                            <h4>{{$lang === 'fr' ? $training->title_fr : $training->title_en}}</h4></a>
                                        <div class="post-info">{{formatDate($t->created_at)}}</div>
<<<<<<< HEAD
                                        <P>Sano Sansaar is the world leading company Sano Sansaar is the world leading
                                            company
                                            Sano Sansaar is the world leading companySano Sansaar is the world leading
                                            companySano Sansaar is the world leading companySano Sansaar is the world
                                            leading company Sano Sansaar is the world leading companySano Sansaar is the
                                            world leading company
                                        </P>
=======
                                         {!! limitStringByLength($lang === 'fr' ? $t->short_description_fr : $t->short_description_en,80) !!}
>>>>>>> 01169ddefcdc6668904171205a304710755c3c17
                                    </div>
                                    </a>
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