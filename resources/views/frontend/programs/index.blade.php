@extends('frontend.layouts.app')

@section('content')
    <!--upcoming programs   -->
    <section class="program-section bg-white section-paddings">
        <div class="container">
            <div class="bnt-heading text-center">
                <button class="btn btn-info no-border">{{__('text.programs')}}</button>

            </div>
            <div class="row">
                @foreach($programs as $p)
                    <div class="col-md-4">
                        <a href="{{route('programs.show',$p->slug)}}">

                        <div class="program-grid">
                            <div class="program-body">
                                 <div class="-grid">
                                <img src="{{$p->getImagePathAttribute()}}">
                            </div>
                            <div class="program-content">
                                    <h4>{{$lang === 'fr' ? $p->title_fr : $p->title_en}}</h4>
                                    {!! limitStringByLength($lang === 'fr' ? $p->description_fr:$p->description_en,180) !!}

                            </div>

                            </div>

                        </div>
                    </a>

                    </div>
                @endforeach
            </div>
            {{$programs->links()}}
        </div>
    </section>
    <!--body wrapper ends here-->
@endsection