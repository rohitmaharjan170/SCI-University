

@extends('frontend.layouts.app')

@section('content')
<section class="bg-off-white  updatepass section-paddings ">
  <div class="container shadow  bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body text-center">
              
                {!! Form::open(['method'=>'POST','route'=>['trainer.verify.email'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
            <h4 class="card-title">Update Password !</h4>
             <div class="form-row">
                    <div class="form-group" style="text-align: left;margin-bottom: 0;font-size: 16px;width: 100%;">
                        {!!Form::label('password','New Password:',['class'=>'col-form-label ']) !!}
                        {!! Form::text('password',old('password:'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('password'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>  </div>
      <div class="form-row">
           
                    <div class="form-group" style="text-align: left;margin-bottom: 0;font-size: 16px;width: 100%;">
                        {!!Form::label('password_confirmation','New Password Confirmation:',['class'=>'col-form-label']) !!}
                        {!! Form::text('password_confirmation',old('password_confirmation:'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('password_confirmation'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                     <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="verify_token" value="{{$verify_token}}">
                <input type="hidden" name="_method" value="PUT">
               <div class="form-group col-md-12" style="margin-top: 20px;padding-left:0;">  <input type="submit" class="btn btn-primary"></div>
              </div>
                </div>
               
                {!! Form::close() !!}
            </div>
                   </div>
        </div>
    </div>
</section>
@endsection
  
