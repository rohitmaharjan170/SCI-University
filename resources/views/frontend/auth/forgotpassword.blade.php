@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper  bg-off-white login-breadcrumb">
        <div class="container">
            <div class="row justify-content-center p-t-20 ">
                <div class="col-md-5 ">
                    <div class="login-box bg-white shadow mt-5 mb-5">

                        <div class="card-body ">
                            <form class="form-horizontal form-material" id="loginform"
                                  action="{{ route('forgotpassword') }}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('email') ? 'border border-danger':''}}"
                                               name="email" type="email" required="" placeholder="Enter your email"></div>
                                    @if($errors->has('email'))
                                        <div class="text-danger">
                                            <span><strong>{{$errors->first('email')}}</strong></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-check form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="container">Student
                                                <input type="radio" name="login_as" id="student" checked="" value="student"f>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="container">Teacher
                                                <input type="radio" name="login_as" id="teacher" value="teacher">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-info float-left p-t-0">
                                            <input id="checkbox-signup" name="remember" type="checkbox"
                                                   class="filled-in chk-col-light-blue">
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div>
                                        <a href="{{route('forgotpassword.index')}}" id="to-recover" class="text-black-50 float-right"><i
                                                    class="fa fa-lock m-r-5"></i> Forgot password?</a></div>
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