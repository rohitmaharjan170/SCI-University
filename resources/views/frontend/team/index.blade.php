@extends('frontend.layouts.app')

@section('content')
    <section class="team-section bg-off-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">Administrative Staff</button>
                
            </div>
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-3">
                        <div class="teams-grid">
                            <div class="team-img-grid">
                                 <img src="{{$team->getImagePathAttribute()}}">
                            </div>
                            <div class="team-info">
                                <h6>{{$team->name}}</h6>
                                <div class="designation">{{$team->designation}}</div>
                                <div class="team-social">
                                    <a href="{{$team->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{$team->instagram}}"><i class="fab fa-instagram"></i></a>
                                    <a href="{{$team->twitter}}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{$team->linkedin}}"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection