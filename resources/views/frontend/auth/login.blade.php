@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper  bg-off-white login-breadcrumb">
        <div class="container">
            <div class="row justify-content-center p-t-20 ">
                <div class="col-md-8 ">
                    <div class="login-box bg-white shadow mt-5 mb-5">
                        <div class="row">
                        <div class="col-md-6">
                             <div class="card-body ">
                            <form class="form-horizontal form-material" id="loginform"
                                  action="{{ route('school.login') }}" method="POST">
                                {{csrf_field()}}
                                <div class="login-logo">
                                    <i class="fas fa-lock text-primary fa-4x"></i>
                                    <h3 class="box-title m-b-20 text-center">Sign In</h3>
                                </div>
                                 <div class="form-check form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="container">Student
                                                <input type="radio" name="login_as" id="student"   {{ (old('login_as','student') === 'student') ? 'checked' : ''}} value="student">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="container">Professor
                                                <input type="radio" name="login_as" id="teacher"  {{ old('login_as') === 'teacher' ? 'checked' : ''}} value="teacher"  >
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('email') ? 'border border-danger':''}}"
                                               name="email" type="text" value="{{old('email')}}" required="" placeholder="Email"></div>
                                    @if($errors->has('email'))
                                        <div class="text-danger">
                                            <span><strong>{{$errors->first('email')}}</strong></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('password') ? 'border border-danger':''}}"
                                               name="password" type="password" required="" placeholder="Password"></div>
                                    @if($errors->has('password'))
                                        <div class="text-danger">
                                            <span><strong>{{$errors->first('password')}}</strong></span>
                                        </div>
                                    @endif
                                </div>

                                {{--<div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="login_type">Login as:</label>

                                        <select name="login_as" id="login_type">
                                            <option> Choose</option>
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                        </select>
                                    </div>
                                </div>--}}

                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-warning btn-rounded" type="submit">Log
                                            In
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-info float-left p-t-0">
                                            <input id="checkbox-signup" name="remember" type="checkbox"
                                                   class="filled-in chk-col-light-blue">
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div>
                                        <a href="{{route('forgotpassword.index')}}" id="to-recover" class="text-info float-right"><i
                                                    class="fa fa-lock m-r-5"></i> Forgot password?</a></div>
                                </div>

                            </form>
                        </div>
                        </div>
                        <div class="col-md-6 right-col">
                            <div class="right-sign-in">
                                <div class="mid-text">or</div>
                             <div class="row">
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        Don't have an account? <a href="{{route('register')}}"
                                                                  class="text-info m-l-5"><b>Sign Up from here</b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-xs-10 col-sm-10 col-md-10 m-t-10">
                                        <div class="social">
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-block  btn-facebook sign-in-btn" data-toggle="tooltip"title="Login with Facebook">
                                                    <i aria-hidden="true"class="fab fa-facebook-f"></i>  Sign in with facebook
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-block  btn-google-plus sign-in-btn" data-toggle="tooltip"title="Login with Facebook">
                                                    <i aria-hidden="true"class="fab fa-google-plus-g"></i>  Sign in with Google
                                                </div>
                                            </a>
                                            <!-- <a href="javascript:void(0)" class="btn btn-googleplus"
                                               data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true"
                                                                                                   class="fab fa-google-plus"></i>
                                            </a> -->
                                        </div>
                                    </div>
                            </div>
                        </div>

                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection