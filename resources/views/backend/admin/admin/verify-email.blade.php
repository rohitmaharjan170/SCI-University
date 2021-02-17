@extends('frontend.layouts.app')
@section('content')
    <section class="body-wrapper bg-off-white login-breadcrumb">
        <div class="container">
            <div class="row justify-content-center p-t-20 ">
                <div class="col-md-6 ">
                    <div class="login-box bg-white shadow mt-5 mb-5">
                        <div class="card-body ">
                            {!! Form::open(['method'=>'POST','route'=>['admin.verify.email'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                            <h5 class="mini-head text-center mb-3">Update Password</h5>
                            <div class="form-group">
                                {!! Form::text('password',old('password'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191",'placeholder'=>'New Password']) !!}
                                @if ($errors->first('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                {!! Form::text('password_confirmation',old('password_confirmation'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191",'placeholder'=>'Confirm Password']) !!}
                                @if ($errors->first('password_confirmation'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="email" value="{{$email}}">
                            <input type="hidden" name="verify_token" value="{{$verify_token}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input class="btn btn-primary" type="submit" value="Update">
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection