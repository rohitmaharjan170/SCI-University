@extends('frontend.layouts.app')

@section('content')
    <section class="team-section bg-off-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">{{__('text.board_of_directors')}}</button>
            </div>

            @foreach($bod as $b)

            <div class="row bod-grid">
                    <div class="col-md-3">
                        <div class="">
                            <img src="{{$b->getImagePathAttribute()}}">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="team-info">
                            <h6>{{$b->name}}</h6>
                            <p class="designation">{!! lang() === 'fr' ? $b->designation : $b->designation !!}</p>

                            <span>{!! lang() === 'fr' ? $b->short_description_fr : $b->short_description_en !!}</span>
                        </div>
                    </div>

            </div>
            @endforeach

        </div>
    </section>
@endsection