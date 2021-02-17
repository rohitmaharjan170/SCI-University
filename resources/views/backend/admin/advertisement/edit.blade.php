@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.advertisement.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($advertisement,['method'=>'PUT','route'=>['admin.advertisement.update',$advertisement->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_en','Title (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_en',old('title_en'),['class'=>"form-control",'required'=>'required',"maxlength"=>"191"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!!Form::label('title_fr','Title (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                                {!! Form::text('title_fr',old('title_fr'),['class'=>"form-control","maxlength"=>"191"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_en','Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_en',old('description_en'),['class'=>"form-control"]) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('description_fr','Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('description_fr',old('description_fr'),['class'=>"form-control"]) !!}
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
                        {!!Form::label('url','URL',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::text('url',old('url'),['class'=>"form-control"]) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!!Form::label('image','Image',['class'=>'col-form-label col-lg-2']) !!}
                            <div class="col-md-4 upload">
                                <div>
                                    {!! Form::file('image',$attributes = ['accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                                </div>
                                @if($errors->first('image'))
                                    <small class="text-danger">{{$errors->first('image')}}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{$advertisement->getImagePathAttribute()}}" width="420px" alt="Press Image">
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
