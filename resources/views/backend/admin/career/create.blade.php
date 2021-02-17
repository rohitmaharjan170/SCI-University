@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.career.index')}}"
                                              class="btn btn-secondary"><b><i
                                    class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
{{--                    {!! Form::open(['method'=>'get','route'=>['admin.career.store'],'files'=>true]) !!}--}}
                    {!! Form::open(['method'=>'POST','route'=>['admin.career.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!!Form::label('title_en','Title (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('title_en',old('title_en'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('title_en'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('title_fr','Title (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('title_fr',old('title_fr'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('title_fr'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('title_fr') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_en','Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_en',old('description_en'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('description_en'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('description_en') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_fr','Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_fr',old('description_fr'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                        @if ($errors->first('description_fr'))
                            <span class="text-danger">
                                        <strong>{{ $errors->first('description_fr') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!!Form::label('status','Status',['class'=>'']) !!}
                                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
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
