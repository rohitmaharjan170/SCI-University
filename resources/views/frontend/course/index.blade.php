@extends('frontend.layouts.app')

@section('content')
    <!--upcoming programs   -->
    <section class="program-section bg-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">{{__('text.our_courses')}}</button>
                <h3 class="mini-head">{{__('text.our_courses_title')}}
                </h3>
            </div>
            <div class="row">
                @foreach($courses as $c)
                    <div class="col-md-4">
                        <div class="program-grid">
                            <img src="{{$c->getImagePathAttribute()}}">
                            <div class="program-content">
                                <a href="{{route('course.show', $c->slug)}}">
                                    <h4>{{$lang === 'fr' ? $c->title_fr : $c->title_en}}</h4>
                                    {!! limitStringByLength($lang === 'fr' ? $c->description_fr:$c->description_en,180) !!}
                                </a>
                                <a href="#">
                                    <button class="btn btn-sm  btn-warning btn-rounded ">
                                        {{__('text.apply_now')}}
                                    </button>
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
            {{$courses->links()}}
        </div>
    </section>
    <!--body wrapper ends here-->
@endsection