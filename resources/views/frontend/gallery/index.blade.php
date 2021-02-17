@extends('frontend.layouts.app')

@section('content')
    <section class="projects-section bg-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">Gallery</button>
            
            </div>
            <div class="row">
                @foreach($gallery as $g)

                    <div class="col-md-4 projects">
                        <div class="program-grid">
                        <a href="{{route('gallery.show',$g->slug)}}">
                            <div class="image-grid">
                                <img src="{{$g->getImagePathAttribute()}}">
                            </div>
                            <div class="project-content">
                                <h4>{{$lang === 'fr' ? $g->title_fr : $g->title_en}}</h4>
                                     {!! $lang === 'fr' ? $g->description_fr : $g->description_en !!}
                            </div>
                        </a>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection