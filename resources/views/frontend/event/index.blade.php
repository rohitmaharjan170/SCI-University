@extends('frontend.layouts.app')
@section('content')
    <section class="event-section bg-off-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">{{__('text.events')}}</button>
             
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
                                    <a href="{{route('event.show',$event->slug)}}"><h5>{{lang() === 'fr' ? $event->title_fr : $event->title_en}}</h5></a>
                                    {!! lang() === 'fr' ? $event->description_fr : $event->description_en !!}
                                    <a href="{{route('event.show',$event->slug)}}">
                                        <button class="btn btn-sm  btn-warning btn-rounded ">
                                            {{__('text.see_more')}}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{$events->links()}}
        </div>
    </section>
@endsection