@extends('backend.layouts.app')

@section('content')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="row" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Search Student</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['method'=>'GET','route'=>['admin.result.search.student'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!!Form::label('search_param','Search',['class'=>'col-form-label']) !!}
                            {!! Form::text('search_param',old('search_param'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191",'placeholder'=>'name or email']) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                        @if(!empty($student))
                            <div class="row">
                                <div class="mt-3">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($student as $s)
                                            <tr>
                                                <td>{{$s->name}}</td>
                                                <td>{{$s->email}}</td>
                                                <td>
                                                    <a href="{{route('admin.result.student',$s->id)}}"><i class="fas fa-eye fa-2x"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    @endif
                    <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@endsection
