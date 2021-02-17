@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Update Password</h4>
                {!! Form::open(['method'=>'POST','route'=>['trainer.verify.email'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <div class="form-group">
                        {!!Form::label('password','New Password',['class'=>'col-form-label ']) !!}
                        {!! Form::text('password',old('password'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('password'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        {!!Form::label('password_confirmation','New Password Confirmation',['class'=>'col-form-label']) !!}
                        {!! Form::text('password_confirmation',old('password_confirmation'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('password_confirmation'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="verify_token" value="{{$verify_token}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="submit">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection