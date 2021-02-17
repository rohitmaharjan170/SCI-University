@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper  bg-off-white login-breadcrumb">
        <div class="container">
            <div class="row justify-content-center p-t-20 ">
                <div class="col-md-5 ">
                    <div class="login-box bg-white shadow mt-5 mb-5">

                        <div class="card-body ">
                            <form class="form-horizontal form-material" id="loginform"
                                  action="{{ route('resetpassword') }}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="user_type" value="{{$user_type}}">
                                <input type="hidden" name="email" value="{{$email}}">
                                <input type="hidden" name="reset_token" value="{{$resetToken}}">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('password') ? 'border border-danger':''}}"
                                               name="password" type="password" required="" placeholder="Enter your new password"></div>
                                    @if($errors->has('password'))
                                        <div class="text-danger">
                                            <span><strong>{{$errors->first('password')}}</strong></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('password_confirmation') ? 'border border-danger':''}}"
                                               name="password_confirmation" type="password" required="" placeholder="Confirm your new password"></div>
                                    @if($errors->has('password_confirmation'))
                                        <div class="text-danger">
                                            <span><strong>{{$errors->first('password_confirmation')}}</strong></span>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-warning btn-rounded" type="submit">Reset password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection