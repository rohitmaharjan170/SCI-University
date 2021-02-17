@extends('frontend.student.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Change Password</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('student.profile.updatepassword')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Old Password</label>
                                    <input type="password" class="form-control {{$errors->has('old_password') ? 'border-danger' : ''}}" name="old_password" value="{{old('old_password')}}">
                                    @if($errors->has('old_password'))
                                        <div class="text-danger">
                                            {{$errors->first('old_password')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control {{$errors->has('password') ? 'border-danger' : ''}}" name="password" value="{{old('password')}}">
                                    @if($errors->has('password'))
                                        <div class="text-danger">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password Confirmation</label>
                                    <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'border-danger' : ''}}" name="password_confirmation" />
                                    @if($errors->has('password_confirmation'))
                                        <div class="text-danger">
                                            {{$errors->first('password_confirmation')}}
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

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
