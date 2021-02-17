@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.trainer.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{--                    {!! Form::open(['method'=>'get','route'=>['admin.trainer.store'],'files'=>true]) !!}--}}
                    {!! Form::open(['method'=>'POST','route'=>['admin.trainer.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('first_name','First Name',['class'=>'col-form-label col-lg-2']) !!}
                                {!! Form::text('first_name',old('first_name'),['class'=>"form-control","maxlength"=>"191"]) !!}
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('password','Password',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('password',old('password'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('password_confirmation','Password Confirmation',['class'=>'col-form-label']) !!}
                                {!! Form::text('password_confirmation',old('password_confirmation'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                                @if ($errors->first('password_confirmation'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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
