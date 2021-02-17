@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.scholarship.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{--                    {!! Form::open(['method'=>'get','route'=>['admin.scholarship.store'],'files'=>true]) !!}--}}
                    {!! Form::open(['method'=>'POST','route'=>['admin.scholarship.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('first_name','First Name',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('first_name',old('first_name'),['class'=>"form-control",'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('first_name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('last_name','Last Name',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('last_name',old('last_name'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('last_name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('country','Country',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('country',old('country'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('country'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('city','City',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('city',old('city'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('city'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('phone','Phone',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::number('phone',old('phone'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('phone'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('email','Email',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('email',old('email'),['class'=>"form-control",'required'=>'required']) !!}
                                @if ($errors->first('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('program',__('text.choose_a_program'),['class'=>'col-form-label']) !!}
                        {!! Form::select('program',$programs, old('program'), ['class'=>'form-control','placeholder'=>'Choose']) !!}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('facebook','Facebook',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('facebook',old('facebook'),['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('instagram','Instagram',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('instagram',old('instagram'),['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('twitter','Twitter',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('twitter',old('twitter'),['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('linkedin','LinkedIn',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('linkedin',old('linkedin'),['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
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
                            {!!Form::label('resume','CV or Resume',['class'=>'col-form-label col-lg-2']) !!}
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
                        <div class="row">
                            <div class="col-md-6">
                                {!!Form::label('status','Status',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status'), ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    {!! Form::close() !!}
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row"></div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
