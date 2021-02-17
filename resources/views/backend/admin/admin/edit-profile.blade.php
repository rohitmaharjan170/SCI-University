@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('admin.profile.update')}}" method="POST">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name" col-form-label col-lg-2>Name</label>
                            <input type="text"
                                   class="form-control {{$errors->has('name') ? 'border border-danger' : ''}}"
                                   name="name" value="{{$admin->name}}">
                            <span class="text-danger"><strong>{{$errors->first('name')}}</strong></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label col-lg-2">Email</label>
                            <input type="email" class="form-control {{$errors->has('email') ? 'border border-danger' : ''}}" name="email" value="{{$admin->email}}">
                            <span class="text-danger"><strong>{{$errors->first('email')}}</strong></span>
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

@push('scripts')
    <script>
        $('button').click(function() {
            $(this).attr('disabled', 'disabled');
            $(this).parents('form').submit();
        });
    </script>
@endpush
