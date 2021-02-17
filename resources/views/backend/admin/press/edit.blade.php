@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{route('admin.press.index')}}"
                                              class="btn btn-secondary"><b><i
                                        class="fas fa-arrow-left"></i></b>&nbsp; &nbsp;Back</a></h5>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($press,['method'=>'PUT','route'=>['admin.press.update',$press->id],'role'=>'form','enctype' => 'multipart/form-data']) !!}

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
                        {!!Form::label('short_description_en','Short Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('short_description_en',old('short_description_en'),['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('short_description_fr','Short Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('short_description_fr',old('short_description_fr'),['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('long_description_en','Long Description (en)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('long_description_en',old('long_description_en'),['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('long_description_fr','Long Description (fr)',['class'=>'col-form-label col-lg-2 require']) !!}
                        {!! Form::textarea('long_description_fr',old('long_description_fr'),['class'=>"form-control",'required'=>'required']) !!}
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!!Form::label('published_by','Published By',['class'=>'']) !!}
                                {!! Form::text('published_by',old('published_by'),['class'=>"form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!!Form::label('published_date','Published Date',['class'=>'']) !!}
                                {!! Form::input('datetime-local', 'published_date', date('Y-m-d\TH:i', strtotime($press->published_date)), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!!Form::label('status','Status',['class'=>'']) !!}
                                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status'), ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!!Form::label('cover_image','Image',['class'=>'col-form-label col-lg-2']) !!}
                            <div class="col-md-4 upload">
                                <div>
                                    {!! Form::file('press_image') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{$press->getImagePathAttribute()}}" width="420" alt="">
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
