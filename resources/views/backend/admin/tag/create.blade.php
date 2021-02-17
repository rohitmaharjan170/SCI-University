@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.tags.index')}}"
                                              class="btn btn-secondary"><b><i
                                    class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
{{--                    {!! Form::open(['method'=>'get','route'=>['admin.tags.store'],'files'=>true]) !!}--}}
                    {!! Form::open(['method'=>'POST','route'=>['admin.tags.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!!Form::label('name','Name',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('name',old('name'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('name'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    {!! Form::close() !!}
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
