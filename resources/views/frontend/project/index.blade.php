@extends('frontend.layouts.app')

@section('content')
    <!--upcotext.projects   -->
    <section class="program-section bg-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">{{__('text.projects')}}</button>
             
            </div>
            <div class="row">
                @foreach($projects as $project)
                <div class="col-md-4">
                        <div class="program-grid pb-0">
                            <a href="{{route('project.show',$project->slug)}}">
                            <div class="project-grid">
                                    <img src="{{$project->getImagePathAttribute()}}">
                                </div>
                                <div class="project-content">
                                        <h4>{{$lang === 'fr' ? $project->title_fr:$project->title_en}}</h4>
                                        {!! $lang === 'fr' ? limitStringByLength($project->description_fr,80) : limitStringByLength($project->description_en,80) !!}
        
                                </div>
                            </a>
                        </div>
                </div>

                    <!-- <div class="col-md-4 projects ">
                        <div class="project-wrap">
                        <a href="{{route('project.show',$project->id)}}">
                             <div class="project-grid">
                                <img src="{{$project->getImagePathAttribute()}}">
                            </div>
                            <div class="projects-info">
                                <h6>{{lang() === 'fr' ? $project->title_fr:$project->title_en}}</h6>
                            </div>
                        </a>
                    </div>
                    </div> -->
                @endforeach
            </div>
            {{$projects->links()}}
        </div>
    </section>
    <!--body wrapper ends here-->
@endsection