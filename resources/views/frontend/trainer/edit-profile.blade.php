@extends('frontend.trainer.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('trainer.profile.update')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"
                                   class="form-control {{$errors->has('name') ? 'border border-danger' : ''}}"
                                   name="name" value="{{$user->getFullNameAttribute()}}">
                            <span class="text-danger"><strong>{{$errors->first('name')}}</strong></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label col-lg-2">Email</label>
                            <input type="email" class="form-control {{$errors->has('email') ? 'border border-danger' : ''}}" name="email" value="{{$user->email}}">
                            <span class="text-danger"><strong>{{$errors->first('email')}}</strong></span>
                        </div>

                        <div class="form-group">
                            <label for="profile_image" class="col-form-label col-lg-2">Profile Image</label>
                            <input type="file"
                                   class="form-control {{$errors->has('profile_image_uploaded') ? 'border border-danger' : ''}}"
                                   name="profile_image_uploaded" />
                            @if($user->profile_image)
                                <img src="{{asset('uploads/images/trainer/'.$user->profile_image)}}" width="300"/>
                            @endif
                            <span class="text-danger"><strong>{{$errors->first('profile_image_uploaded')}}</strong></span>
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
