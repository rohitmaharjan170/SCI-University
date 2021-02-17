@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper section-paddings">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="bnt-heading text-center">
                        <button class="btn btn-info no-border">Current Openings</button>
                        <h5 class="mini-head">Feel fulfilled. Have fun. Help us to shape the future.
                        </h5>
                    </div>
                    @foreach($careers as $career)
                        <div class="card bg-white shadow p-5">
                            <div class="iconlist-item-content">
                                <h3>{{$career->title_en}}
{{--                                    <a class="btn btn-warning btn-rounded accent float-right" data-ps2id-api="true">Apply Now</a>--}}
                                </h3>
                                {!! $career->description_en !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection