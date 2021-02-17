@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper  ">

        <!--press section starts-->
        <section class="press-section bg-off-white  section-paddings">
            <div class="container">
                <div class="bnt-heading text-center">
                    <button class="btn btn-info no-border">{{__('text.press')}}</button>
                    <h3 class="mini-head">{{__('text.press_title')}}</h3>
                </div>
                <div class="row">
                    @if(!empty($press[0]))

                        <div class="col-md-6 ">
                            <div class="press-grid press-lg">
                                <img src="{{$press[0]->getImagePathAttribute()}}">
                                <div class="event-info">
                                    @if(!empty($press[0]->published_date))
                                        <i class="fas fa-clock"></i> {{formatDate($press[0]->published_date)}}
                                    @endif
                                    <a href="{{route('press.show',$press[0]->slug)}}">
                                        <h5>{{lang() === 'fr' ? $press[0]->title_fr : $press[0]->title_en}}</h5></a>
                                    {!! lang() === 'fr' ? $press[0]->short_description_en : $press[0]->short_description_en !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($press) > 0)
                        <div class="col-md-6">
                            @foreach($press as $key=>$p)
                                @if($key > 0 && $key < 4)
                                    <div class="press-grid press-md">
                                        <img src="{{$p->getImagePathAttribute()}}">
                                        <div class="event-info">
                                            @if(!empty($p->published_date))
                                                <i class="fas fa-clock"></i> {{formatDate($p->published_date)}}
                                            @endif
                                            <a href="{{route('press.show',$p->slug)}}">
                                                <h5>{{lang() === 'fr' ? $p->title_fr : $p->title_en}}</h5>
                                            </a>
                                            {!! lang() === 'fr' ? $p->short_description_en : $p->short_description_en !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                @if(count($press) > 4)
                    <div class="row">
                        @foreach($press as $key=>$p)
                            @if($key > 3)
                                <div class="col-md-4">
                                    <div class="press-grid mt-3">
                                        <img src="{{$p->getImagePathAttribute()}}">
                                        <div class="event-info">
                                            @if(!empty($p->published_date))
                                                <i class="fas fa-clock"></i> {{formatDate($p->published_date)}}
                                            @endif
                                            <a href="{{route('press.show', $p->id)}}">
                                                <h5>{{lang() === 'fr' ? $p->title_fr : $p->title_en}}</h5>
                                            </a>
                                                {!! lang() === 'fr' ? $p->short_description_en : $p->short_description_en !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </section>
@endsection