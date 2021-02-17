@extends('frontend.layouts.app')

@section('content')
    <!--body wrapper starts here-->
    <section class="body-wrapper">
        <!--sllider image starts here-->
        <div id="demo" class="carousel slide sci-slide" data-ride="carousel">

            <!-- The slideshow -->
            <div class="carousel-inner">
                @foreach($banners as $key => $banner)
                    <div class="carousel-item {{ $key == 0 ? 'active':''  }}">
                    <!--         <div class="carousel-caption mid-caption">
                            <button class="btn btn-info no-border">{{__('text.community')}}</button>
              
                                <?php
                    $lang = isset($lang) ? $lang : 'en';
                    $bTitle = "title_" . $lang;
                    $bDesc = "description_" . $lang;
                    ?>
                            <h3 class="mt-3 mb-3">{{$banner->$bTitle}}</h3>
                                    {!!$banner->$bDesc!!}
                            <a href="{{ route('admission')}}">
                                        <button class="btn btn-warning btn-rounded ">
                                            <i class="fas fa-user p-r-5"></i> {{__('text.apply_now')}}
                            </button>
                        </a>
                </div> -->

                        @if(!empty($banner->image))
                            <img src="{{$banner->getImagePathAttribute()}}" alt="slider -1">
                        @else
                            <iframe width="560" height="315" src="{{$banner->video_url}}" frameborder="0"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        @endif
                    </div>

                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <!--sllider image ends here-->
        <?php if(count($notices) > 0){?>
        <div class="mt-3 mb-3">
            <div id="notice" class="carousel slide sci-slide" data-ride="carousel">

                <!-- The slideshow -->
                <div class="carousel-inner">
                    @foreach($notices as $key => $notice)
                        <div class="carousel-item {{ $key == 0 ? 'active':''  }}">
                        <!--         <div class="carousel-caption mid-caption">
                            <button class="btn btn-info no-border">{{__('text.community')}}</button>

                                <?php
                        $lang = isset($lang) ? $lang : 'en';
                        $bTitle = "title_" . $lang;
                        $bDesc = "description_" . $lang;
                        ?>
                                <h3 class="mt-3 mb-3">{{$notice->$bTitle}}</h3>
                                    {!!$notice->$bDesc!!}

                                </div> -->

                            @if(!empty($notice->image))
                                <img src="{{$notice->getImagePathAttribute()}}" alt="slider -1">
                            @endif
                        </div>

                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#notice" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#notice" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
        </div>
        <?php } ?>
        <div class="ads">
            <div class="container">
            <!-- <div class="highlights-caption">
                    <div class="highlights-left">
                        <h4>{{__('text.application_for_scholarship')}}: </h4>

                    </div>
                    <div class="highlights-right">
                        <h4>{{__('text.application_for_scholarship')}}: </h4>

                    </div>
                </div> -->
                <div class="ads-img">
                    @if(!empty($advertisement[0]))
                        <a href="{{$advertisement[0]->url??null}}" target="_blank"><img
                                    src="{{$advertisement[0]->getImagePathAttribute()}}" class="img img-responsive"></a>
                    @endif
                </div>

            </div>
        </div>
        <div class="container section-paddings">
            <div class="text-center">

            </div>

        </div>

        <!--abt wrapper-->
        <section class="abt-wrapper bg-white section-paddings">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="bnt-heading te">
                            <h4 style='font-family: "Univers LT Std";color:#132B90;font-size: 35px;'>Education Beyond
                                Education which created Leaders , Entrepreneurs and
                                Managers!!!</h5> <!--     <h5 style='font-size:30px;'>{{__('text.welcome_title')}}</h5> -->
                        </div>
                        <p>{{ $lang === 'fr' ? SiteSettings('welcome_message_fr') : SiteSettings('welcome_message_en') }}</p>
                        <div class="features">
                            <div class="row">
                                <div class="col-md-3 feature-grid">
                                    <div class="features-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <h6>{{__('text.knowledge')}}</h6>
                                </div>
                                <div class="col-md-3 feature-grid">
                                    <div class="features-icon">
                                        <i class="fas fa-external-link-alt"></i>
                                    </div>
                                    <h6>{{__('text.innovation')}}</h6>
                                </div>
                                <div class="col-md-3 feature-grid">
                                    <div class="features-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h6>{{__('text.entrepreneurship')}}</h6>
                                </div>
                                <div class="col-md-3 feature-grid">
                                    <div class="features-icon">
                                        <i class="fas fa-thumbs-up"></i>
                                    </div>
                                    <h6>{{__('text.success')}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grp-students">
                        <img src="{{asset('frontend/images/grpstudents2.png')}}" style="border:8px solid #efefef;">
                    </div>
                </div>

            </div>

        </section>

        @if(!empty($deanMessage))
            <section class="abt-wrapper bg-white section-paddings">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 dean-img">
                            <img src="{{$deanMessage->getImagePathAttribute()}}" style="height: 100%">
                        </div>
                        <div class="col-md-8 ">
                            <div class="dean-content text-justify">
                                <h5 class="dean-heading">{{$deanMessage->name}}</h5>
                                <p style="font-size: 15px;" class="text-justify"><strong>{{$deanMessage->post}}</strong>
                                </p>
                                {!! $lang === 'fr' ? $deanMessage->description_fr : $deanMessage->description_en !!}
                            </div>

                        </div>
                    </div>

                </div>

            </section>
        @endif

    <!--map welcome-->
        <section class="map-welcome bg-off-white section-paddings">
            <div class="container">

                <div class="row">
                    <div class="col-md-4  map-img">
                        <h4 class="mini-head" style="padding:0;margin-bottom:5px;font-size: 23px;color:#132B90;"><i
                                    class="fas fa-check" style="margin-right: 5px;"></i>American Graduate Certification
                            !</h4>
                        <h4 class="mini-head" style="padding:0;margin-bottom:5spx;color:#1D97c9;font-size: 23px;"><i
                                    class="fas fa-check" style="margin-right: 5px;"></i>Internationally Recongnized !
                        </h4>
                        <h4 class="mini-head" style="padding:0;margin-bottom:5px;color:#585858;;font-size: 23px;"><i
                                    class="fas fa-check" style="margin-right: 5px;"></i>Complete in 6 Months !</h4>
                        <div style="width:100%;text-align: center;"><img src="{{asset('frontend/images/map-img.png')}}"
                                                                         style="height: 60%;text-align: center;width: 160px;margin-top: 10px;">
                        </div>

                    </div>
                    <div class="col-md-8 ">
                        <div class="map-check-list">
                            <div class="bnt-heading text-center">
                                <h3 class="mini-head" style="color:#132B90;font-size:35px;">Executive ICE- MBA(USA)</h3>
                                <P style="font-size: 20px;">International Executive Certification in Entrepreneurship,
                                    Marketing and Managerial
                                    Business Administration !</P>
                            </div>
                            <div class="executiveulwrap" style="text-align: center;">
                                <div class="executiveul" style="display: inline-block;">
                                    <ul style="text-align: justify;">
                                        <strong style=" font-size: 20px;">Three Available Specializaions For Executive
                                            ICE-MBA(USA):</strong>
                                        <li style="color: #dc3545; font-size: 25px;"><i class="fas fa-check"
                                                                                        style="color: #dc3545;"></i>
                                            Executive ICE-MBA(USA) in Finance
                                        </li>
                                        <li style="color:#03a84e; font-size: 25px;"><i class="fas fa-check"
                                                                                       style="color:#03a84e;"></i>
                                            Executive ICE-MBA(USA) in Marketing
                                        </li>
                                        <li style="color:#132B90; font-size: 25px;"><i class="fas fa-check"
                                                                                       style="color:#132B90"></i>
                                            Executive ICE-MBA(USA) in Management
                                        </li>
                                    <!--  <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li>
                                <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li>
                                <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li> -->
                                    </ul>
                                    <a href="{{ route('admission')}}">
                                        <button class="btn btn-warning btn-rounded ">
                                            {{__('text.apply_now')}}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php /*  <div class="col-md-4 ">
                        <div class="map-check-list">
                            <div class="bnt-heading text-center">
                                <h3 class="mini-head">Executive ICE- MBA(USA)</h3>
                                <P>International Executive Certification in Entrepreneurship, Marketing and Managerial
                                    Business Administration !</P>
                            </div>
                            <ul>
                                <strong>Three Available Specializaions:</strong>
                                <li><i class="fas fa-check"></i>Executive ICIT(USA) in Machine Learning</li>
                                <li><i class="fas fa-check"></i> Executive ICIT(USA) in Software Engineering</li>
                                <li><i class="fas fa-check"></i> Executive ICIT(USA) in Business Intelligence</li>
                            <!--  <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li>
                                <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li>
                                <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li> -->
                            </ul>
                            <a class="text-center" href="{{ route('admission')}}">
                                <button class="btn btn-warning btn-rounded ">
                                    {{__('text.apply_now')}}
                                </button>
                            </a>
                        </div>
                    </div> 
*/?>
                </div>
            </div>


            <div class="container pt-5">

                <div class="row">
                    <div class="col-md-4 map-img">
                        <h4 class="mini-head " style=" padding:0;margin-bottom:5px;font-size: 23px;color:#132B90;"><i
                                    class="fas fa-check" style="margin-right: 5px;"></i>American Graduate Master's
                            <div class="mini-head-center" style="margin-left: 30%;">Degree !</div>
                        </h4>
                        <h4 class="mini-head" style="padding:0;margin-bottom:5spx;color:#1D97c9;font-size: 23px;"><i
                                    class="fas fa-check" style="margin-right: 5px;"></i>Internationally Recongnized !
                        </h4>
                        <h4 class="mini-head" style="padding:0;margin-bottom:5px;color:#585858;;font-size: 23px;"><i
                                    class="fas fa-check" style="margin-right: 5px;"></i>Complete in 18 Months !</h4>
                        <div style="width:100%;text-align: center;"><img src="{{asset('frontend/images/map-img2.png')}}"
                                                                         style="height: 60%;text-align: center;width: 160px;margin-top: 10px;">
                        </div>

                    </div>
                    <div class="col-md-8 ">
                        <div class="map-check-list">
                            <div class="bnt-heading text-center">
                                <h3 class="mini-head" style="color:#132B90;font-size:35px;">Executive Master's
                                    Degree</h3>
                                <P style="font-size: 20px;">International Executive Certification in Entrepreneurship,
                                    Marketing and Managerial
                                    Business Administration !</P>
                            </div>
                            <div class="executiveulwrap" style="text-align: center;">
                                <div class="executiveul" style="display: inline-block;">
                                    <ul style="text-align: justify;">
                                        <strong style=" font-size: 20px;">Three Available Specializaions For Executive
                                            Master's Degree:</strong>
                                        <li style="color: #dc3545; font-size: 25px;"><i class="fas fa-check"
                                                                                        style="color: #dc3545;"></i>
                                            Executive Master’s Degree in Finance
                                        </li>
                                        <li style="color:#03a84e; font-size: 25px;"><i class="fas fa-check"
                                                                                       style="color:#03a84e;"></i>Executive
                                            Master’s Degree in Marketing
                                        </li>
                                        <li style="color:#132B90; font-size: 25px;"><i class="fas fa-check"
                                                                                       style="color:#132B90"></i>
                                            Executive Master’s Degree in Management
                                        </li>
                                    <!--  <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li>
                                <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li>
                                <li><i class="fas fa-check"></i> {{__('text.specialization_body')}}</li> -->
                                    </ul>
                                    <a href="{{ route('admission')}}">
                                        <button class="btn btn-warning btn-rounded ">
                                            {{__('text.apply_now')}}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <!--adds section starts here-->
        <section class="mid-ads bg-off-white section-paddings">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ads-img">
                            @if(!empty($advertisement[1]))
                                <a href="{{$advertisement[1]->url ?? null}}" target="_blank"><img
                                            src="{{$advertisement[1]->getImagePathAttribute()}}"></a>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                        @if(!empty($advertisement[2]))
                            <a href="{{$advertisement[2]->url ?? null}}" target="_blank"><img
                                        src="{{$advertisement[2]->getImagePathAttribute()}}"></a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        @foreach($category as $cat)
        <section class="degree-section bg-white section-paddings" style="display: inline-block;width:100%">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border">{{$lang === 'fr' ? $cat->name_fr : $cat->name_en}}</button>

                </div>
                <div>
                    
                    @foreach($cat->programs as $program)
                    <div class="col-md-3" style="float: left;">
                        <a href="{{url('programs/show/'.$program->slug)}}">
                        <div class="program-body">
                            <p style="text-align: center;    background: #f4f5f9;margin-bottom: 0;    font-size: 14px;
    font-weight: bold;padding: 5px 0">
                            
    {{$lang === 'fr' ? $program->title_fr : $program->title_en}}
                            </p>
                            <div class="-grid" style="overflow: hidden;">
                                <img src="{{asset('uploads/images/program/'.$program->image)}}">
                            </div>
                            <div class="program-content" style="text-align: center;">
                                <p>
                                    {!! $lang === 'fr' ? $program->description_fr : $program->description_en !!}
                                </p>

                            </div>

                        </div>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach

        <section class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
                            <div class="input-group">
                                <form method="post" route="{{'subscribe.store'}}">
                                    {{ csrf_field() }}

                                    <input name="email" type="email" class="form-control" required id="email" placeholder="Enter your email">

                                        <button class="btn" type="submit">Subscribe Now</button>

                                    @if(Session::has('message'))
                                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                                    @endif

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--upcoming programs   -->
       <?php /* <section class="program-section bg-white section-paddings">
            <div class="container">

                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border">{{__('text.category')}}</button>

                </div>
                <div id="category-slider" class="carousel slide sci-slider-grid" data-ride="carousel">
                    <!-- The slideshow -->
                    <?php $capArray = array_chunk($category->toArray(), 4);
                    $iterator = 0;
                    $activeClass = "active";
                    ?>
                    <div class="carousel-inner">
                        @foreach($capArray as $capChunks)
                            <div class="carousel-item {{$activeClass}}">
                                <div class="row">

                                    @foreach($capChunks as $chunkItem)
                                        <?php $c = $category[$iterator++];?>
                                        <div class="col-md-3">
                                            <div class="program-grid">
                                                <div class="program-body">
                                                    <div class="program-body-img">
                                                        <img src="{{$c->getImagePathAttribute()}}">
                                                    </div>
                                                    <div class="program-home-content">
                                                        <a href="{{route('category.show',$c->slug)}}">
                                                            <h4>{{$lang === 'fr' ? $c->name_fr : $c->name_en}}</h4>
                                                            {{--                                            {!! limitStringByLength($lang === 'fr' ? $c->description_fr : $c->description_en,180) !!}--}}
                                                        </a>

                                                    </div>
                                                <!-- <a href="{{route('category.show',$c->slug)}}">
                                        <button class="btn btn-block  btn-warning btn-sm ">
                                            {{__('text.see_more')}}
                                                        </button>
                                                    </a> -->
                                                </div>

                                            </div>
                                        </div>
                                        <?php $activeClass = "";?>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach


                    </div>
                    <a class="carousel-control-prev" href="#category-slider" data-slide="prev">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#category-slider" data-slide="next">
                        <i class="fas fa-angle-right"></i>
                    </a>
        </section> */?>




        <!--fb and form section-->
        <section class="partners-section bg-off-white section-paddings bg-off-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4" style="text-align: center;">

                        <div class="row" style="text-align: center;  ">

                            <h6 class="mini-head text-center mb-3"
                                style="color:#dc3545;text-align: center;width: 100%;padding-bottom: 12px;">Accreditation
                                for Teaching Institutions !</h6>
                            <img src="/frontend/images/accred.jpg">
                            <button class="btn btn-warning btn-rounded "
                                    style="margin:0 auto;background: #dc3545;margin-top: 10px;">
                                <a href="/acreditation" style="color:#fff;">Apply Now</a>
                            </button>

                        </div>
                    <!-- <div class="form-group">
                            <input class="form-control" maxlength="191" placeholder="{{__('text.specialisation')}}"
                                   name="specialisation" type="text">
                        </div> -->


                    </div>
                    <div class="col-md-4">
                        <h6 style="text-align: center;">Verify the Authenticity and the Validity of your Degree Here
                            !</h6>
                        <a href="https://verify.accredible.com/input?type=id" target="_blank" class="credential-img">
                            <img src="/frontend/images/credential.jpeg" width="100%">
                        </a>
                    <!-- <div class="form-group">
                            <input class="form-control" maxlength="191" placeholder="{{__('text.specialisation')}}"
                                   name="specialisation" type="text">
                        </div> -->


                    </div>

                    <div class="col-md-4">

                        <div class="section-paddings text-center">

                            <div class="elearning">
                                <h6>Contact to our E- Learning Platform !</h6>
                                <a href="http://scieducation.matrixlms.com/" target="_blank"><img
                                            src="/frontend/images/elearning.jpeg"></a>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-md-4">
                        <div class="fb-page" data-href="https://www.facebook.com/sciafriqueci/"
                             data-tabs="timeline" data-width=""
                             data-height="" data-small-header="false"
                             data-adapt-container-width="true" data-hide-cover="false"
                             data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/sciafriqueci/"
                                        class="fb-xfbml-parse-ignore">

                                <a href="https://www.facebook.com/sciafriqueci/">SCI Afrique</a></blockquote>
                        </div>
                    </div> -->
                </div>


            </div>
        </section>

        <!--parallax -->
        <div class="parallax">
            <div class="paralax-overlay">
                <h3>{{__('text.society_for_creative_innovation_title')}}</h3>
                <P style="font-size: 13px;">
                    {{__('text.society_for_creative_innovation_body')}}

                </P>
            <!--   <a href="{{route('admission')}}">
                    <button class="btn btn-warning btn-rounded ">
                        {{__('text.apply_now')}}
                    </button>
                </a> -->
            </div>
        </div>

        <?php /*    <!--projects-->
        <section class="projects-section bg-white section-paddings">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border"><a href="/projects" style="color:#fff;">{{__('text.projects')}}</a></button>

                </div>
                <div id="assoc-slider" class="carousel slide sci-slider-grid" data-ride="carousel"
                     data-interval="false">
                <?php $capArray = array_chunk($companyAssociateProjects->toArray(), 4);
                $iterator = 0;
                $activeClass = "active";
                ?>
                <!-- The slideshow -->
                    <div class="carousel-inner">
                        @foreach($capArray as $capChunks)
                            <div class="carousel-item {{$activeClass}}">
                                <div class="row">
                                    @foreach($capChunks as $chunkItem)
                                        <?php $project = $companyAssociateProjects[$iterator++];?>
                                        <div class="col-md-3 projects">
                                            <a href="{{route('project.show',$project->slug)}}">
                                                <div class="projects-img">
                                                    <img src="{{$project->getImagePathAttribute()}}">
                                                </div>
                                                <div class="projects-info">
                                                    <h6>{{$lang === 'fr' ? $project->title_fr:$project->title_en}}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <?php $activeClass = ''; ?>
                        @endforeach

                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#assoc-slider" data-slide="prev">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#assoc-slider" data-slide="next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </section>
*/?>
        <?php /*    <!--frenchies section starts here-->
        <section class="frenchies bg-off-white section-paddings">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border">{{__('text.our_franchise')}}</button>

                </div>
                <div id="frienchies-slider" class="carousel slide sci-slider-grid" data-ride="carousel"
                     data-interval="false">
                    <!--The slideshow -->
                    <?php $capArray = array_chunk($franchise->toArray(), 4);
                    $iterator = 0;
                    $activeClass = "active";
                    ?>

                    <div class="carousel-inner">
                        @foreach($capArray as $capChunks)
                            <div class="carousel-item {{$activeClass}}">
                                <div class="row">
                                    @foreach($capChunks as $chunkItem)
                                        <?php $f = $franchise[$iterator++];?>
                                        <div class="col-md-3 text-center">
                                            <a href="{{$f->url}}" target="_blank">
                                                <div class="frenchies-grid">
                                                    <div class="images">
                                                        <div class="frenchies-img">
                                                            <img src="{{$f->getImagePathAttribute()}}">
                                                        </div>
                                                        <div class="logo">
                                                            <img src="{{$f->getImagePathAttribute()}}">
                                                        </div>
                                                    </div>
                                                    <div class="location"><i
                                                                class="fas fa-map-marker-alt"></i>{{$lang ==='fr' ? $f->title_fr : $f->title_en}}
                                                    </div>
                                                    <div class="description">

                                                        {!! limitStringByLength($lang ==='fr' ? $f->description_fr:$f->description_en ,180) !!}
                                                    </div>

                                                </div>
                                            </a>
                                        </div>
                                        <?php $activeClass = "";?>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#frienchies-slider" data-slide="prev">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#frienchies-slider" data-slide="next">
                        <i class="fas fa-angle-right"></i>
                    </a>

                </div>
            </div>
        </section>
        <!--frenchies ends here-->
*/?>
    <!--events section starts-->
        <section class="event-section bg-white section-paddings">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border"><a href="/events"
                                                              style="color:#fff;">{{__('text.events')}}</a></button>

                </div>
                <div class="row">
                    @foreach($events as $event)
                        <div class="col-md-6">
                            <a href="{{route('event.show',$event->slug)}}">
                                <div class="event-grid">
                                    <div class="event-img-grid">
                                        <img src="{{$event->getImagePathAttribute()}}">
                                    </div>
                                    <div class="event-info">
                                        <i class="fas fa-calender"></i> <i
                                                class="fas fa-clock"></i> {{formatDate($event->created_at)}}
                                        <a href="{{route('event.show',$event->slug)}}">
                                            <h5>{{lang() === 'fr' ? $event->title_fr : $event->title_en}}</h5></a>
                                    {!! lang() === 'fr' ? $event->description_fr : $event->description_en !!}
                                    <!--    <a href="{{route('event.show',$event->slug)}}">
                                        <button class="btn btn-sm  btn-warning btn-rounded ">
                                            {{__('text.see_more')}}
                                            </button>
                                        </a> -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!--teams-->
        <section class="team-section bg-off-white section-paddings">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border"><a href="/team" style="color:#fff;">{{__('text.teams')}}</a>
                    </button>

                </div>
                <div id="team-slider" class="carousel slide sci-slider-grid" data-ride="carousel">
                <?php $capArray = array_chunk($teams->toArray(), 4);
                $iterator = 0;
                $activeClass = "active";
                ?>

                <!-- The slideshow -->
                    <div class="carousel-inner">
                        @foreach($capArray as $capChunks)
                            <div class="carousel-item {{$activeClass}}">
                                <div class="row">
                                    @foreach($capChunks as $chunkItem)
                                        <?php $team = $teams[$iterator++]?>
                                        <div class="col-md-3">
                                            <div class="teams-grid">
                                                <div class="team-img-grid">
                                                    <img src="{{$team->getImagePathAttribute()}}">
                                                </div>
                                                <div class="team-info">
                                                    <h6>{{$team->name}}</h6>
                                                    <div class="designation">{{$team->designation}}</div>
                                                    <div class="team-social">
                                                        <a href="{{$team->facebook}}" target="_blank"><i
                                                                    class="fab fa-facebook-f"></i></a>
                                                        <a href="{{$team->instagram}}" target="_blank"><i
                                                                    class="fab fa-instagram"></i></a>
                                                        <a href="{{$team->twitter}}" target="_blank"><i
                                                                    class="fab fa-twitter"></i></a>
                                                        <a href="{{$team->linkedin}}" target="_blank"><i
                                                                    class="fab fa-linkedin"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <?php $activeClass = ""; ?>
                        @endforeach
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#team-slider" data-slide="prev">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#team-slider" data-slide="next">
                        <i class="fas fa-angle-right"></i>
                    </a>

                </div>

            </div>
        </section>

        <!--press section starts-->
        <section class="press-section bg-off-white  bg-white section-paddings">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border">{{__('text.press')}}</button>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        @if(!empty($press[0]->id))
                            <div class="press-grid press-lg">
                                <a href="{{$press[0]->slug}}">

                                    @if(!empty($press[0]->getImagePathAttribute()))
                                        <img src="{{$press[0]->getImagePathAttribute()}}">
                                    @endif
                                    <div class="event-info">
                                        @if(!empty($press[0]->published_date))
                                            <i class="fas fa-calendar-alt"></i> {{formatDate($press[0]->published_date)}}
                                        @endif
                                        @if(!empty($press[0]->title_en || $press[0]->title_fr))
                                            <a href="{{route('press.show',$press[0]->slug)}}">
                                                <h5>{{$lang === 'fr' ? $press[0]->title_fr : $press[0]->title_en}}</h5>
                                        @endif
                                        @if(!empty($press[0]->short_description_en) || !empty($press[0]->short_description_fr))
                                            {!! limitStringByLength($lang === 'fr' ? $press[0]->short_description_fr : $press[0]->short_description_en,180) !!}
                                        @endif

                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        @foreach($press as $key => $p)
                            @if($key > 0)
                                <div class="press-grid press-md">
                                    <a href="{{route('press.show',$p->slug)}}">
                                        <img src="{{$p->getImagePathAttribute()}}">
                                        <div class="event-info">
                                            <i class="fas fa-calendar-alt"></i> {{formatDate($p->published_date)}}
                                            <a href="{{route('press.show',$p->slug)}}">
                                                <h5>{{$lang === 'fr' ? $p->title_fr : $p->title_en}}</h5>
                                                <p class="press-details"> {{$lang === 'fr' ? strip_tags($p->short_description_fr) : strip_tags($p->short_description_en)}}
                                                </p>


                                            {!! limitStringByLength($lang === 'fr' ? $p->short_description_fr : $p->short_description_en,180) !!}
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--testimonials-->
        <section class="testimonials-section   section-paddings">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border">{{__('text.testimonials')}}</button>
                </div>
                <div id="testimonial-slider" class="carousel slide sci-slider-grid" data-ride="carousel">
                    <!-- The slideshow -->
                    <?php $capArray = array_chunk($testimonials->toArray(), 3);
                    $iterator = 0;
                    $activeClass = "active";
                    ?>
                    <div class="carousel-inner">
                        @foreach($capArray as $capChunks)
                            <div class="carousel-item {{$activeClass}}">
                                <div class="row">
                                    @foreach($capChunks as $chunkItem)
                                        <?php $t = $testimonials[$iterator++];?>
                                        <div class="col-md-4 testimonials-grid">
                                            <div class="testimonials-box">
                                                {!! $lang === 'fr' ? $t->body_fr : $t->body_en !!}
                                            </div>
                                            <div class="testim-info">
                                                <img src="{{$t->getImagePathAttribute()}}" class="user-img">
                                                <h6>{{$t->name}}</h6>
                                                <span>{{ $lang ==='fr' ? $t->title_fr : $t->title_en }}
                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        <?php $activeClass = '';?>
                    @endforeach
                    <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#testimonial-slider" data-slide="prev">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#testimonial-slider" data-slide="next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#testimonial-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonial-slider" data-slide-to="1"></li>
                        <li data-target="#testimonial-slider" data-slide-to="2"></li>
                    </ul>
                </div>


            </div>
        </section>

        <!--gallery section starts here-->
        <section class="partners-section section-paddings bg-off-white">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border"><a href="/gallery"
                                                              style="color:#fff;">{{__('text.gallery')}}</a></button>
                </div>
                <div id="gallery-slider" class="carousel slide sci-slider-grid" data-ride="carousel">
                <?php $capArray = array_chunk($gallery->toArray(), 4);
                $iterator = 0;
                $activeClass = "active";
                ?>
                <!-- The slideshow -->
                    <div class="carousel-inner">
                        @foreach($capArray as $capChunks)
                            <div class="carousel-item {{$activeClass}}">
                                <div class="row">
                                    @foreach($capChunks as $chunkItem)
                                        <?php $g = $gallery[$iterator++];?>
                                        <div class="col-md-3 gallery-grid"><!-- partner-grid -->
                                            <a href="{{route('gallery.show',$g->slug)}}">
                                                <img src="{{$g->getImagePathAttribute()}}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <?php $activeClass = '';?>
                        @endforeach
                    </div>
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#gallery-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#gallery-slider" data-slide-to="1"></li>
                        <li data-target="#gallery-slider" data-slide-to="2"></li>
                    </ul>
                </div>

            </div>

        </section>


        <!--featured student section starts-->
        @if($featuredStudent->isNotEmpty())
            <section class="team-section section-paddings">
                <div class="container">
                    <div class="bnt-heading text-center">
                        <button class="btn btn-info no-border">Featured Student</button>

                    </div>
                    <div id="featured-student-slider" class="carousel slide sci-slider-grid" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            @foreach($featuredStudent->chunk(4) as $key=>$student)
                                <div class="carousel-item @if($key == 0) active @endif">
                                    <div class="row">
                                        @foreach($student as $s)
                                            <div class="col-md-3">
                                                <div class="teams-grid">
                                                    <div class="team-img-grid">
                                                        <img src="{{$s->getImagePathAttribute()}}">
                                                    </div>
                                                    <div class="team-info">
                                                        <h6>{{$s->name}}</h6>
                                                        <div class="designation">{{$s->title}}</div>
                                                        <p>{!! limitStringByLength($s->description,180) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#featured-student-slider" data-slide="prev">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#featured-student-slider" data-slide="next">
                            <i class="fas fa-angle-right"></i>
                        </a>

                    </div>

                </div>
            </section>

    @endif

    <!--partners section starts here-->
        <section class="partners-section section-paddings bg-off-white">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border">{{__('text.partners')}}</button>
                </div>
                <div id="partner-slider" class="carousel slide sci-slider-grid" data-ride="carousel"
                     data-interval="false">
                <?php $capArray = array_chunk($partners->toArray(), 4);
                $iterator = 0;
                $activeClass = "active";
                ?>

                <!-- The slideshow -->
                    <div class="carousel-inner">
                        @foreach($capArray as $capChunks)
                            <div class="carousel-item {{$activeClass}}">
                                <div class="row">
                                    @foreach($capChunks as $chunkItem)
                                        <?php $p = $partners[$iterator++];?>
                                        <div class="col-md-3 partner-grid-img">
                                            <a href="{{$p->url}}" target="_blank">
                                                <img src="{{$p->getImagePathAttribute()}}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        <?php $activeClass = "";?>
                    @endforeach
                    <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#partner-slider" data-slide="prev">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#partner-slider" data-slide="next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#partner-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#partner-slider" data-slide-to="1"></li>
                        <li data-target="#partner-slider" data-slide-to="2"></li>
                    </ul>
                </div>

            </div>

        </section>
        <!--body wrapper ends here-->
@endsection


