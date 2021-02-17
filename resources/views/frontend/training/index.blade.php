@extends('frontend.layouts.app')

@section('content')
    <!--upcoming programs   -->
    <section class="program-section bg-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">{{__('text.trainings')}}</button>
               
            </div>
            <div class="row">
                @foreach($trainings as $t)
                    <div class="col-md-4">
                        <div class="program-grid">
                                 <a href="{{route('training.show',$t->slug)}}">
                           <div class="project-grid">

                            <img src="{{$t->getImagePathAttribute()}}">
                        </div>
                            <div class="training-content">
                                    <h4>{{$lang === 'fr' ? $t->title_fr : $t->title_en}}</h4>
                                    {!! limitStringByLength($lang === 'fr' ? $t->short_description_fr:$t->short_description_en,180) !!}
                                
                                
                            </div>
                                 <a href="{{route('purchase.training',$t->slug)}}">
                                    <button class="btn btn-sm  btn-warning btn-rounded ">
                                        {{__('text.enroll_now')}}
                                    </button>
                                </a>
                            </a>

                        </div>

                    </div>
                @endforeach
            </div>
            {{$trainings->links()}}
        </div>
    </section>
    <!--body wrapper ends here-->
@endsection