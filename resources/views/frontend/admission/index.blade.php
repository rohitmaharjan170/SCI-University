@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper  bg-off-white login-breadcrumb">
        <div class="container">
            <div class="row justify-content-center p-t-20 ">
                <div class="col-md-6 ">

                    <div class="login-box bg-white shadow mt-5 mb-5">
                        <div class="card-body ">
                            {!! Form::open(['method'=>'POST','route'=>['admission.apply'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                            <h3 class="mini-head text-center mb-3">Apply Now</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('first_name',old('first_name'),['class'=>"form-control",'required',"maxlength"=>"191",'placeholder'=>'First name']) !!}
                                        @if ($errors->first('first_name'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('last_name',old('last_name'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191",'placeholder'=>'Last name']) !!}
                                        @if ($errors->first('last_name'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('country',old('country'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191",'placeholder'=>'Country']) !!}
                                        @if ($errors->first('country'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('city',old('city'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191",'placeholder'=>'City']) !!}
                                        @if ($errors->first('city'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::number('phone',old('phone'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191",'placeholder'=>'Phone']) !!}
                                        @if ($errors->first('phone'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('email',old('email'),['class'=>"form-control",'required'=>'required','placeholder'=>'Email']) !!}
                                        @if ($errors->first('email'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!!Form::label('program_id','Programs',['class'=>'col-form-label']) !!}
                                {!! Form::select('program_id', $programs, old('program_id'), ['class'=>'form-control','placeholder'=>'Choose']) !!}
                                @if ($errors->first('program_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('program_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!!Form::label('how_did_you_hear_us','How did you hear us?',['class'=>'col-form-label']) !!}
                                        {!! Form::select('how_did_you_hear_us',['friends'=>'Friends','web'=>'Web','facebook' => 'Facebook', 'instagram' => 'Instagram', 'twitter' => 'Twitter', 'linkedin' => 'LinkedIn'], old('how_did_you_hear_us'), ['class'=>'form-control','placeholder'=>'Choose']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {!!Form::label('resume','CV or Resume',['class'=>'col-form-label']) !!}
                                    <div class="col-md-4 upload">
                                        <div>
                                            {!! Form::file('resume') !!}
                                        </div>
                                        @if ($errors->first('resume'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('resume') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Apply Now</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection