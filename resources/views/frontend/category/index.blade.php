@extends('frontend.layouts.app')

@section('content')
    <!--upcoming programs   -->
    <section class="program-section bg-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">{{__('text.programs')}}</button>
                <h3 class="mini-head">{{__('text.programs_title')}}
                </h3>
            </div>
            <div class="row">
                @foreach($category->programs as $p)
                    <div class="col-md-4">
                        <div class="program-grid">
                            <div class="program-category">{{$category->name_en ?? null}}</div>
                            <div class="program-body">
                                <img src="{{$p->getImagePathAttribute()}}">
                            <div class="program-content">
                                <a href="{{route('programs.show',$p->slug)}}">
                                    <h4>{{$lang === 'fr' ? $p->title_fr : $p->title_en}}</h4>
                                    {!! limitStringByLength($lang === 'fr' ? $p->description_fr:$p->description_en,180) !!}
                                </a>

                            </div>
                                <a href="{{route('programs.show',$p->slug)}}">
                                    <button class="btn btn-sm  btn-block btn-warning">
                                        {{__('text.see_more')}}
                                    </button>
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--body wrapper ends here-->
@endsection