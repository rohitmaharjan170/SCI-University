@extends('frontend.layouts.app')

@section('content')
    <section class="body-wrapper bg-off-white login-breadcrumb">
        <div class="container">
            <div class="row justify-content-center p-t-20 ">
                <div class="col-md-6 ">
                    <div class="login-box bg-white shadow mt-5 mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                                <h5 class="mini-head text-center mb-3">Admin Login</h5>

                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" placeholder="Email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                                Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

{{--                                        <a class="btn btn-link" href="#">--}}
{{--                                            Forgot Your Password?--}}
{{--                                        </a>--}}
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
