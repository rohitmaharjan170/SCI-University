@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper  bg-off-white login-breadcrumb">
        <div class="container">
            <div class="row justify-content-center p-t-20 ">
                <div class="col-md-5">
                    <div class="login-box bg-white shadow mt-5 mb-5">
                        <div class="card-body ">
                            <form class="form-horizontal form-material" action="{{route('school.register')}}" method="POST">
                                <div class="login-logo">
                                    <i class="fas fa-lock text-primary fa-4x"></i>
                                    <h3 class="box-title m-b-20 text-center">Sign Up</h3>
                                </div>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('name') ? 'border border-danger':''}}"
                                               type="text" name="name" value="{{old('name')}}" required=""  placeholder=" Full Name ">
                                        @if($errors->has('name'))
                                            <div class="text-danger">
                                                <span><strong>{{$errors->first('name')}}</strong></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('email') ? 'border border-danger':''}}" type="text" value="{{old('email')}}" name="email" required=""
                                               placeholder=" Email ">
                                        @if($errors->has('email'))
                                            <div class="text-danger">
                                                <span><strong>{{$errors->first('email')}}</strong></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control {{$errors->has('password') ? 'border border-danger':''}}" type="password" name="password" required=""
                                               placeholder=" Password ">
                                        @if($errors->has('password'))
                                            <div class="text-danger">
                                                <span><strong>{{$errors->first('password')}}</strong></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password_confirmation"
                                               required="" placeholder=" Confirm Password ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-success p-t-0">
                                            <input id="checkbox-signup" type="checkbox"
                                                   class="filled-in chk-col-light-blue" style="height:10px;">
                                           I am aware and agree that by subscribing my personal data will be used according to the  SCI Education USA University  <a href="/terms-and-conditions" target="blank"> Terms and Conditions of Use*</a> and Data Protection and <a href="/privacy-policy" target="blank"> Privacy Policy*</a> and be subject thereto. 
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center p-b-20">
                                    <div class="col-xs-12">
                                        <button id="submit" class="btn btn-warning btn-lg btn-block btn-rounded text-uppercase"
                                                type="submit" disabled>Sign Up
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        Already have an account? <a href="/login"class="text-info  m-l-5"><b>Sign
                                        In from here</b></a>
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

@push('scripts')
    <script>
        $('#checkbox-signup').click(function () {
            //check if checkbox is checked
            if ($(this).is(':checked')) {
                $('#submit').removeAttr('disabled'); //enable input
            } else {
                $('#submit').attr('disabled', true); //disable input
            }
        });
    </script>
@endpush