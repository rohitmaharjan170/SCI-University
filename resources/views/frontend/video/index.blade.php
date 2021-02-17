@extends('frontend.layouts.app')

@section('content')
    <section class="program-section bg-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">Videos</button>
                
            </div>
            <div class="row">
                @foreach($videos as $key => $video)
                    @php
                        $fact = $key % 5 < 3 ? 4 : 6;
                    @endphp
                    <div class="col-md-{{$fact}}">
                        <div class="video-grid">
                            <iframe width="100%" height="250" src="{{$video->url}}" frameborder="0"
                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <div class="video-content">
                                <a href="#">
                                    <h4>{{$lang === 'fr' ? $video->title_fr : $video->title_en}}</h4>
                                    {!! $lang === 'fr' ? $video->description_fr : $video->description_en !!}
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection